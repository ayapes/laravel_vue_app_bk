<template>
  <h3>書籍情報</h3>
  <div class="mb-5">
    <label for="search" class="form-label">本を検索</label>
    <input type="text" name="search" id="" v-model="keyword" class="form-control">
    <button class="btn btn-primary" v-on:click="search">検索</button>
  </div>
  <div class="booklist" v-for="Book in Books" :key="Book.book_id">
    <p class="booklist_title"><router-link v-bind:to="{ name: 'book', params: { id: Book.book_id } }">{{
      Book.title
    }}</router-link></p>
    <p class="booklist_img">
      <!-- 画像データがなければダミー画像表示するv-if -->
      <span v-if="Book.largeImageUrl" data-bs-toggle="modal" data-bs-target="#imgModal"><img :src="Book.largeImageUrl" alt=""></span>
      <span v-else data-bs-toggle="modal" data-bs-target="#imgModal"><img :src="dummy" alt=""></span>
    </p>
    <div class="booklist_others">
      <p class="booklist_author">著者：{{ Book.author }}</p>
      <p class="booklist_publisher">出版社：{{ Book.publisher }}</p>
      <p class="booklist_isbn">ISBN：{{ Book.isbn }}</p>
      <p class="booklist_gunre">ジャンル：{{ Book.gunre }}</p>
      <p class="booklist_summary">{{ Book.summary }}</p>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="imgModal" tabindex="-1" aria-labelledby="imgModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span v-if="Book.largeImageUrl"><img :src="Book.largeImageUrl" alt="" style="width:100%;"></span>
          <span v-else><img :src="dummy" alt="" style="width:100%;"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  </div>


</template>

<script>
import axios from "axios";

export default {
  name: 'BookList',
  data() {
    return {
      APIdata: '',
      Books: '',
      dummy: '/images/bookicon.png',
      keyword: '',
    }
  },
  async mounted() {
    const url = '/api/books';
    const response = await axios.get(url);
    console.log(response.data);
    // このresponse.dataは３つのオブジェクトが入った配列
    // APIから取得した全データを保存
    this.APIdata = response.data;
    // 検索機能で上書きするためにコピーを作る
    this.Books = response.data;
  },
  // methods: {
  //   search() {
  //     console.log(this.keyword)
  //     // value→なんでもいい仮引数
  //     // filter()は続けて使える（メソッドチェーン）
  //     this.data = this.data.filter(value => value.title.includes(this.keyword));
  //     console.log(this.data);
  //   }
  // },

  methods: {
    search() {
      console.log(this.keyword)
      // value→なんでもいい仮引数
      // filter()は続けて使える（メソッドチェーン）
      const result = this.APIdata.filter(value =>
        value.title.includes(this.keyword) ||
        value.author.includes(this.keyword) ||
        value.publisher.includes(this.keyword) ||
        value.ISBN.includes(this.keyword) ||
        value.summary.includes(this.keyword)
      );

      // const result = this.APIdata.filter((book) => book.title.includes(this.keyword));
      console.log(result);
      this.Books = result;

    }
  },

}
</script>
<style>

</style>