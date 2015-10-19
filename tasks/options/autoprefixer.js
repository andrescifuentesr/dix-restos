module.exports = {
  options: {
    browsers: ['last 2 version', 'ie >= 9']
  },
  multiple_files: {
    expand: true,
    flatten: true,
    src: 'css/build/*.css',
    dest: 'css/build/prefixed/'
  }
}