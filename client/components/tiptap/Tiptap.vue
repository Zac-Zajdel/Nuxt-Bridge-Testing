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
      <button
        :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
      >
        h1
      </button>
      <button
        :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
      >
        h2
      </button>
      <button
        :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
      >
        h3
      </button>
      <button
        :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
      >
        h4
      </button>
      <button
        :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 5 }).run()"
      >
        h5
      </button>
      <button
        :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 6 }).run()"
      >
        h6
      </button>

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
    }
  },
  mounted () {
    this.editor = new Editor({
      extensions: [
        StarterKit,
        Highlight,
        Typography,
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
        <pre><code class="language-css">body {
          display: none;
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

.ProseMirror code {
  background-color: rgba(#616161, 0.1);
  color: #616161;
}

/* Content styling */
.content {
  padding: 1rem 0 0;
}
.content h3 {
  margin: 1rem 0 0.5rem;
}

.content pre {
  border-radius: 5px;
  color: #333;
}

.content code {
  display: block;
  white-space: pre-wrap;
  font-size: 0.8rem;
  padding: 0.75rem 1rem;
  background-color: #e9ecef;
  color: #495057;
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
