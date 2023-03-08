<template>
  <h3>
    書籍詳細情報
  </h3>
  <!-- <h4>{{bookData}}</h4> -->
  <div class="booklist">
    <p class="booklist_title">{{ bookData.title }}</p>
    <p class="booklist_img">
      <!-- 画像データがなければダミー画像表示するv-if -->
      <span v-if="bookData.img"><img :src="bookData.img" alt=""></span>
      <span v-else><img :src="dummy" alt=""></span>
    </p>
    <div class="booklist_others">
      <p class="booklist_author">著者：{{ bookData.author }}</p>
      <p class="booklist_publisher">出版社：{{ bookData.publisher }}</p>
      <p class="booklist_isbn">ISBN：{{ bookData.ISBN }}</p>
      <p class="booklist_gunre">ジャンル：{{ bookData.gunre }}</p>
      <p class="booklist_summary">{{ bookData.summary }}</p>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      この本を借りる
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">この本を借りる</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            （２週間後の日付）まで借りる or （レンタル中のため）借りることが出来ないことを表示
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <button type="button" class="btn btn-primary" v-on:click="rentBook" data-bs-dismiss="modal">決定</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import { addDays } from 'date-fns'; //date-fns利用

export default {
  name: 'BookDetail',
  data() {
    return {
      bookData: {},
      dummy: '/images/bookicon.png',
    }
  },
  async mounted() {
    // const url = `/api/books/${this.$route.params.id}`;
    // const response = await axios.get(url);
    // this.bookData = response.data;

    // ↓api/books/1はBookControllerのshow()で指定されるようになった。
    axios.get(`/api/books/${this.$route.params.id}`)
      .then(response => this.bookData = response.data)
  },
  methods: {
    async rentBook() {
      // APIに対して、借りる処理を送る
      // loansテーブルのapiに、book_id,user_id,loan_date,return_dateを送信する処理
      const url = "/api/loans";

      // 「決定」押した時点でインスタンス作成＝押した日時
      const now = new Date();
      const loan_date = now.toLocaleDateString();

      // 返却日は設定がない限り2週間後にする。
      const twoWeeksLater = addDays(now, 13); //date-fns利用
      const return_date = twoWeeksLater.toLocaleDateString();

      // userid一緒だとおもしろくないのでランダムにした。。。それだけ
      const user_rand = Math.floor(Math.random() * 9);

      // この本を借りることをAPIに送る
      const response =
        await axios.post(
          url,
          {
            book_id: this.$route.params.id,
            user_id: user_rand,
            loan_date: loan_date,
            return_date: return_date,

          });
      console.log(response);
      console.log("useridは"+user_rand);

      // 本を借りたらHOMEに戻る
      this.$router.push('/');

    },
  }
}
</script>