// https://browsersync.io/docs/options

module.exports = {
    server: {
        baseDir: "./",
        index: "index.html",
        directory: true,
    },
    files: [
        "./dist/**/*.css",
        // don't refresh on js changes
        "!./dist/**/*.js",
        "./**/*.html",
    ],
    notify: false,
    injectChanges: true,
    online: true,
    reloadOnRestart: true,
    logFileChanges: true,
    ghostMode: false,
    logLevel: "warn",
};
