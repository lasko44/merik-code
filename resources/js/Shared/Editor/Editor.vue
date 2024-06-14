<template>
    <div ref="editor" className="editor"></div>
</template>

<script>
import 'ace-builds/src-noconflict/ace';
import 'ace-builds/src-noconflict/mode-javascript';
import 'ace-builds/src-noconflict/theme-github_dark';

export default {
  name: 'CodeEditor',
  props: {
    value: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      editor: null,
    };
  },
  watch: {
    value(newVal) {
      this.editor.setValue(newVal);
    },
  },
  mounted() {
    this.initEditor();
  },
  methods: {
    initEditor() {
      const ace = window.ace;

      // Manually load Ace worker scripts
      ace.config.set('basePath', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/');

      // Load Ace worker scripts
      const importScripts = ['worker-javascript.js', 'worker-css.js', 'worker-html.js', 'worker-json.js'];
      for (const script of importScripts) {
        const scriptEl = document.createElement('script');
        scriptEl.src = `${ace.config.get('basePath')}/worker-${script}`;
        document.body.appendChild(scriptEl);
      }

      this.editor = ace.edit(this.$refs.editor);
      this.editor.getSession().setMode('ace/mode/javascript');
      this.editor.setTheme('ace/theme/github_dark');
      this.editor.setValue(this.value, -1); // -1 is to move the cursor to the start
      this.editor.on('change', () => {
        this.$emit('input', this.editor.getValue());
      });
    },
  },
  beforeDestroy() {
    if (this.editor) {
      this.editor.destroy();
      this.editor.container.remove();
    }
  },
};
</script>

<style>
.editor {
  height: 400px;
  width: 100%;
  border-radius: 4px;
}
</style>
