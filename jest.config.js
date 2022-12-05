module.exports = {
    testRegex: 'resources/assets/js/.*.test.js$',
    "testEnvironment": "jsdom",
    "moduleNameMapper": {
        "\\.(css|less|scss|sass)$": "identity-obj-proxy"
    },
    moduleFileExtensions: [
        'js',
        'json',
        'vue'
      ],
      transform: {
        "^.+\\.(js|jsx)$": "babel-jest",
        "^.+\\.vue$": "@vue/vue2-jest"
      }
}