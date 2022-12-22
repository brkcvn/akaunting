const esModules = ['uuid'].join('|');

module.exports = {
    testRegex: 'resources/assets/js/.*.test.js$',
    "testEnvironment": "jsdom",
    moduleFileExtensions: [
        'vue',
        'json',
        'js'
      ],
      transform: {
        "^.+\\.(js|jsx)$": "babel-jest",
        "^.+\\.vue$": "@vue/vue2-jest",
      },
      moduleNameMapper: {
        "/src\/(.*)/": "/src/$1",
        'test/(.*)': '/__test__/$1',
        "\\.(css|less|scss|sass)$": "identity-obj-proxy"
      },
}