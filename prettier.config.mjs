/** @type {import("prettier").Config} */
export default {
    semi: true,
    tabWidth: 4,
    printWidth: 80,
    endOfLine: 'lf',
    phpVersion: '8.2',
    singleQuote: true,
    arrowParens: 'avoid',
    bracketSpacing: true,
    trailingComma: 'es5',
    proseWrap: 'preserve',
    trailingCommaPHP: true,
    plugins: [ '@prettier/plugin-php'],
};
