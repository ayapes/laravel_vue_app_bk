<template>
    <!-- Vueから楽天APIにアクセス　※CORS邪魔してwsl接続ではややこしいことになります。 -->
    <h3>書籍の登録</h3>
    <label for="rakutenTitle" class="form-label">タイトル</label><input type="text" id="rakutenTitle" class="form-control" v-model="rakutenTitle">
    <label for="rakutenAuthor" class="form-label">著者</label><input type="text" id="rakutenAuthor" class="form-control" v-model="rakutenAuthor">
    <button v-on:click="getBooksDataByRakutenAPI" class="btn btn-success" type="button">楽天APIから書籍情報をGET</button><br><br>
    <h4>検索結果</h4>
    <div v-for="Book in Books"></div>
    <!-- <form>はclickイベントが発生するとページを移動させる効果がある -->
    <!-- <form> -->
        <!-- <label for="title" class="form-label">タイトル</label> -->
        <!-- 双方向データーバインディング　v-model P65 -->
        <!-- <input type="text" class="form-control" id="title" v-model="book.title" />
        <br>
        <label for="author" class="form-label">著者</label>
        <input type="text" class="form-control" id="title" v-model="book.author" />
        <br>
        <label for="publisher" class="form-label">出版社</label>
        <input type="text" class="form-control" id="title" v-model="book.publisher" />
        <br>
        <label for="ISBN" class="form-label">ISBN</label>
        <input type="text" class="form-control" id="title" v-model="book.ISBN" />
        <br>
        <label for="summary" class="form-label">説明</label>
        <input type="text" class="form-control" id="title" v-model="book.summary" />
        <br>
        <label for="gunre" class="form-label">ジャンル</label>
        <input type="text" class="form-control" id="title" v-model="book.gunre" />
        <button v-on:click="send" class="btn btn-primary" type="button">送信</button><br><br> -->
        
    <!-- </form> -->
</template>

<script>

import axios from "axios";

export default {
    name: "BookAdd",
    data() {
        return {
            // 入力フォームのデータを保存するオブジェクト
            book: {
                title: '',
                author:'',
                publisher:'',
                ISBN:'',
                summary:'',
                gunre:'',
                available: true,

            },
            rakutenTitle:'',
            rakutenAuthor:'',
        }
    },

    methods: {
        // クリックイベントの発火時に動作するメソッド
        async send() {
            console.log('click');
            const url = "/api/books";
            // axios.post('送信先','送信データthis.')
            const response = await axios.post(url, this.book);
            console.log(response);
        },
        async getBooksDataByRakutenAPI(){
            const url ="https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?format=json&title="+this.rakutenTitle+"&author="+this.rakutenAuthor+"applicationId=1045443226673597322";
            const response = await axios.get(url);
            console.log(response);
        }

    }
};
</script>