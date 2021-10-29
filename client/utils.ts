/**
 * Takes a word and captializes the first character
 * @param string Word being captialized
 * @returns string
 */
export function ucFirst (string: string): string {
  return string.charAt(0).toUpperCase() + string.slice(1)
}

/**
 * Shortens a string to a specific length
 * @param string - The string we are shortening
 * @param length - Length of string before we truncate
 * @returns string
 */
export function shortenString (string: string, length: number): string {
  if (!string) return ''

  if (string.length > length)
    return `${string.substring(0, length)}...`

  return string
}
