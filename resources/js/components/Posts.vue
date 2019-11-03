<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <input type="text" name="search" class="form-control" v-model="searchKey" />
        <br />Articles
        <small>({{ articles.length }})</small>
      </div>
      <div class="card-body">
        <article class="mb-3" v-for="(article,i) in articles" :key="i">
          <text-highlight :queries="queries">{{ article.title }}</text-highlight>
          <div v-for="(tag, i) in article.tags" :key="i">
            <text-highlight :queries="queries">{{tag}}</text-highlight>
          </div>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    articles: {
      required: true,
      type: Array
    }
  },
  data() {
    return {
      queries: "",
      searchKey: undefined
    };
  },
  watch: {
    searchKey: _.debounce(async function(newVal) {
      await axios.post("/search", { key: newVal });
    }, 1000)
  }
};
</script>
