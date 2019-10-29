<template>
  <model-select :options="options" v-model="item" placeholder="select item"></model-select>
</template>

<script>
import "vue-search-select/dist/VueSearchSelect.css";
import { ModelSelect } from "vue-search-select";
export default {
  data() {
    return {
      options: [
        { value: "1", text: "aa" + " - " + "1" },
        { value: "2", text: "ab" + " - " + "2" },
        { value: "3", text: "bc" + " - " + "3" },
        { value: "4", text: "cd" + " - " + "4" },
        { value: "5", text: "de" + " - " + "5" }
      ],
      item: {
        value: "",
        text: ""
      }
    };
  },
  components: {
    ModelSelect
  }
};
</script>

<style>
</style>