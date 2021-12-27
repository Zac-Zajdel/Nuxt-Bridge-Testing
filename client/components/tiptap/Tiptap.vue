<template>
  <page-wrapper>
    <div
      v-if="editor"
      class="bg-gray-200 rounded-t border-b border-gray-600"
    >
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        :class="{'is-active': editor.isActive('bold')}"
        @click="editor.chain().focus().toggleBold().run()"
      >
        <icon-text-bold
          class="h-3 w-3 text-indigo-500"
        />
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded text-gray-300"
        :class="{ 'is-active': editor.isActive('italic') }"
        @click="editor.chain().focus().toggleItalic().run()"
      >
        <icon-text-italic
          class="h-3 w-3 text-indigo-500"
        />
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        :class="{ 'is-active': editor.isActive('strike') }"
        @click="editor.chain().focus().toggleStrike().run()"
      >
        <icon-text-strike-through
          class="h-3 w-3 text-black"
        />
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        :class="{ 'is-active': editor.isActive('code') }"
        @click="editor.chain().focus().toggleCode().run()"
      >
        <icon-code-line
          class="h-3 w-3 text-indigo-500"
        />
      </button>

      <!-- these need to go into dropdown -->
      <div class="relative inline">
        <div class="inline">
          <button
            v-on-clickaway="closeDropdown"
            class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
            @click="showHeadings = true"
          >
            <icon-heading
              class="h-3 w-3 text-gray-500"
            />
          </button>
          <transition
            mode="out-in"
            enter-class="transform -translate-y-1"
            enter-active-class="transition ease-out duration-150"
            leave-active-class="ease-in duration-100"
            leave-to-class="transform -translate-y-1"
          >
            <div
              v-if="showHeadings"
              class="origin-top-right absolute right-0 mt-2 w-10 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="user-menu-button"
              tabindex="-1"
            >
              <button
                v-for="heading in headings"
                :key="heading.name"
                @click="editor.chain().focus().toggleHeading({ level: heading.value }).run()"
              >
                <span class="block px-3 py-2 rounded-md cursor-pointer text-sm font-medium hover:bg-gray-100 divide-y divide-y-2">
                  {{ heading.name }}
                </span>
              </button>
            </div>
          </transition>
        </div>
      </div>

      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        :class="{ 'is-active': editor.isActive('bulletList') }"
        @click="editor.chain().focus().toggleBulletList().run()"
      >
        <icon-bulleted-list
          class="h-3 w-3 text-gray-500"
        />
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        :class="{ 'is-active': editor.isActive('orderedList') }"
        @click="editor.chain().focus().toggleOrderedList().run()"
      >
        <icon-ordered-list
          class="h-3 w-3 text-gray-500"
        />
      </button>
      <button
        :class="{ 'is-active': editor.isActive('codeBlock') }"
        @click="editor.chain().focus().toggleCodeBlock().run()"
      >
        code block
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        :class="{ 'is-active': editor.isActive('blockquote') }"
        @click="editor.chain().focus().toggleBlockquote().run()"
      >
        <icon-block-quote
          class="h-3 w-3 text-gray-500"
        />
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        @click="editor.chain().focus().setHorizontalRule().run()"
      >
        <icon-minus
          class="h-3 w-3 text-gray-500"
        />
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        @click="editor.chain().focus().undo().run()"
      >
        <icon-go-back
          class="h-3 w-3 text-gray-500"
        />
      </button>
      <button
        class="p-2.5 bg-gray-200 hover:bg-gray-300 rounded"
        @click="editor.chain().focus().redo().run()"
      >
        <icon-go-forward
          class="h-3 w-3 text-gray-500"
        />
      </button>
    </div>

    <!-- Actual tiptap rendered component -->
    <editor-content :editor="editor" />
  </page-wrapper>
</template>

<script>
import { Editor, EditorContent } from '@tiptap/vue-2'
import StarterKit from '@tiptap/starter-kit'
import Highlight from '@tiptap/extension-highlight'
import Typography from '@tiptap/extension-typography'
import CodeBlockLowlight from '@tiptap/extension-code-block-lowlight'
import lowlight from 'lowlight'

export default {
  components: {
    EditorContent,
  },
  props: {
    content: {
      type: String,
      default: '',
    },
  },
  data () {
    return {
      editor: null,
      showHeadings: false,
      headings: [
        {
          name: 'H1',
          value: 1,
        },
        {
          name: 'H2',
          value: 2,
        },
        {
          name: 'H3',
          value: 3,
        },
        {
          name: 'H4',
          value: 4,
        },
        {
          name: 'H5',
          value: 5,
        },
        {
          name: 'H6',
          value: 6,
        },
      ],
    }
  },
  mounted () {
    this.editor = new Editor({
      extensions: [
        StarterKit,
        Highlight,
        Typography,
        CodeBlockLowlight.configure({
          lowlight,
        }),
      ],
      // content: this.content,
      content: `<h2>
          Hi there,
        </h2>
        <p>
          this is a <em>basic</em> example of <strong>tiptap</strong>. Sure, there are all kind of basic text styles you’d probably expect from a text editor. But wait until you see the lists:
        </p>
        <ul>
          <li>
            That’s a bullet list with one …
          </li>
          <li>
            … or two list items.
          </li>
        </ul>
        <p>
          Isn’t that great? And all of that is editable. But wait, there’s more. Let’s try a code block:
        </p>
        <pre><code class="language-javascript">for (var i = 1; i <= 20; i++)
        {
          if (i % 15 == 0)
            console.log("FizzBuzz");
          else if (i % 3 == 0)
            console.log("Fizz");
          else if (i % 5 == 0)
            console.log("Buzz");
          else
            console.log(i);
        }</code></pre>
        <p>
          I know, I know, this is impressive. It’s only the tip of the iceberg though. Give it a try and click a little bit around. Don’t forget to check the other examples too.
        </p>
        <blockquote>
          Wow, that’s amazing. Good work, boy! 👏
          <br />
          — Mom
        </blockquote>
      `,
    })
  },

  beforeUnmount () {
    this.editor.destroy()
  },

  methods: {
    closeDropdown () {
      this.showHeadings = false
    },
  },
}
</script>

<style>
/* Table styling */
.ProseMirror > * + * {
  margin-top: 0.25em;
}

.ProseMirror {
  @apply rounded-b-md border border-gray-400 border-t-0 p-3;
}

.ProseMirror pre {
  background: #0d0d0d;
  border-radius: 0.5rem;
  color: #fff;
  font-family: "JetBrainsMono", monospace;
  padding: 0.75rem 1rem;
}

.ProseMirror code {
  background: none;
  color: inherit;
  font-size: 0.8rem;
  padding: 0;
}

.ProseMirror .hljs-comment, .hljs-quote {
  color: #616161;
}

.ProseMirror
  .hljs-variable,
  .hljs-template-variable,
  .hljs-attribute,
  .hljs-tag,
  .hljs-name,
  .hljs-regexp,
  .hljs-link,
  .hljs-name,
  .hljs-selector-id,
  .hljs-selector-class {
    color: #f98181;
  }

.ProseMirror
  .hljs-number,
  .hljs-meta,
  .hljs-built_in,
  .hljs-builtin-name,
  .hljs-literal,
  .hljs-type,
  .hljs-params {
    color: #fbbc88;
  }

.ProseMirror
  .hljs-string,
  .hljs-symbol,
  .hljs-bullet {
    color: #b9f18d;
  }

.ProseMirror
  .hljs-title,
  .hljs-section {
    color: #faf594;
  }

.ProseMirror .hljs-emphasis {
  font-style: italic;
}

.ProseMirror .hljs-strong {
  font-weight: 700;
}

/* Content styling */
.content {
  padding: 1rem 0 0;
}
.content h3 {
  margin: 1rem 0 0.5rem;
}

.ProseMirror ul {
  padding: 0, 1rem;
  display: block;
  list-style-type: disc;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  padding-inline-start: 40px;
}

.ProseMirror ol {
  padding: 0, 1rem;
  display: block;
  list-style-type: decimal;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  padding-inline-start: 40px;
}

.ProseMirror h1 {
  display: block;
  font-size: 2em;
  line-height: 1.1;
  margin-block-start: 0.67em;
  margin-block-end: 0.67em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

.ProseMirror h2 {
  display: block;
  font-size: 1.5em;
  margin-block-start: 0.83em;
  margin-block-end: 0.83em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

.ProseMirror h3 {
  display: block;
  font-size: 1.17em;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

.ProseMirror h4 {
  display: block;
  margin-block-start: 1.33em;
  margin-block-end: 1.33em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

.ProseMirror h5 {
  display: block;
  font-size: 0.83em;
  margin-block-start: 1.67em;
  margin-block-end: 1.67em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

.ProseMirror h6 {
  display: block;
  font-size: 0.67em;
  margin-block-start: 2.33em;
  margin-block-end: 2.33em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

.ProseMirror img {
  max-width: 100%;
  height: auto;
}

.ProseMirror blockquote {
  padding-left: 1rem;
  border-left: 2px solid rgba(#0d0d0d, 0.1);
}

.ProseMirror hr {
  border: none;
  border-top: 2px solid rgba(13,13,13,.1);
  margin: 2rem 0;
}
</style>
