const themeName = process.env.THEME_NAME;

const mix = require('laravel-mix');
const path = require('path');

const autoprefixer = require('autoprefixer');
const cssMqpacker = require('css-mqpacker');
const cpx = require('cpx');

const sourcesPath = path.resolve('src');

let outputPath = `public/wp-content/themes/${themeName}`;

if (process.env.WORDPRESS_DIR) {
  outputPath = `public/${process.env.WORDPRESS_DIR}/wp-content/themes/${themeName}`;
}

if (mix.inProduction()) {
  outputPath = 'dist';
}

const copyFiles = `${sourcesPath}/**/*.{html,php,css,png,jpg,gif,svg,ico,woff,woff2,eot,ttf,txt,md,pdf,webm,mp4}`;

if (process.env.NODE_ENV === 'watch') {
  cpx.watch(copyFiles, outputPath);
} else {
  cpx.copy(copyFiles, outputPath);
}

mix
  .setPublicPath(outputPath)
  .sass(`${sourcesPath}/scss/style.scss`, `${outputPath}`)
  .js(`${sourcesPath}/js/main.js`, `${outputPath}/js`)
  .copy(`${sourcesPath}/js/plugins/**/*.js`, `${outputPath}/js/plugins`);

mix.options({
  cache: true,
  keepalive: true,
  processCssUrls: false,
  postCss: [
    autoprefixer,
    cssMqpacker({
      sort: true
    })
  ],
  clearConsole: true
});

if (mix.inProduction()) {
  mix.options({
    cache: false,
    postCss: [
      require('csswring')({
        removeAllComments: false
      })
    ]
  });
}

mix.disableNotifications();
