# Project title

Project description here.

### Requirements

- [npm](https://www.npmjs.com/)
- [gulp](http://gulpjs.com/)
- [bower](http://bower.io)

### Current Dependencies

- [*Sass*](http://sass-lang.com/) - Css preprocessor
- [*Jeet*](http://jeet.gs) - Flexible Grid system
- [*Include media*](http://include-media.com/) - Media queries
- [*Knapsack*](https://github.com/kni-labs/knapsack) - Css Utilities and mixins

### Installation
- `npm install` (Will automatically trigger bower install)

## Organization

This build kit uses `src`, `build`, and `dist` folders to organize theme development:

* `src`: this directory contains the raw material for your theme: templates (`src/`), PHP includes (`src/inc`), language files (`src/languages`), styles (`src/scss`), scripts (`src/js`), and images (anywhere under `src/`). **Only edit files in this directory!**
* `build`: generated by Gulp, this is a *working copy* of your theme for use in development and testing.

* `dist`: short for distribution, this will be the final, polished copy of your theme for production. You will need to manually run `gulp dist` to create a new distribution. You can also symlink this directory for a final round of testing; just keep in mind that your theme will now be in `dist/[project]`, where `[project]` is the setting at the top of the Gulp configuration. This project folder is what you will want to deploy to production. (No more weird junk in your themes. Hooray!)

Note: both the `build` and `dist` directories are disposable and can be regenerated from the contents of `src`. You aren't likely to want to edit files in this folders but you may want to open them up to diagnose issues with the build process itself.

There is also a `gulp` folder containing the configuration file and two task directories, active and inactive. All files in the `tasks-active` directory will be required at runtime and available for use.
