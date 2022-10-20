module.exports = {
    presets: [
        [
            "@babel/preset-env",
            {
                modules: false,
                useBuiltIns: false,
                targets: {
                    browsers: [
                        "> 2%",
                        "not dead"
                    ],
                },
            },
        ],
    ],
    plugins: [],
};
