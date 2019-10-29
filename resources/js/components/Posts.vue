<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        Articles
        <small>({{ articles.length }})</small>
      </div>
      <div class="card-body">
        <searchable></searchable>
        <article class="mb-3" v-for="(article,i) in articles" :key="i">
          <h2>{{ article.title }}</h2>

          <p class="m-0">{{ article.body }}</p>

          <div v-for="(tag, i) in article.tags" :key="i">
            <span class="badge badge-light">{{tag}}</span>
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
  }
};
</script>
