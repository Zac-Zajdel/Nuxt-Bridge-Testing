/**
 * Takes a word and captializes the first character
 * @param string Word being captialized
 * @returns string
 */
export function ucFirst (string: string): string {
  return string.charAt(0).toUpperCase() + string.slice(1)
}
