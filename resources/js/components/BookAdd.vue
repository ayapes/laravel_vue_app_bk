<template>
    <h3>楽天APIから書籍検索</h3>
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" v-model="title">
        <br><label for="title">著者</label>
        <input type="text" class="form-control" id="author" v-model="author">
        <button class="btn btn-primary" v-on:click="getRakutenAPI">検索</button>
    </div>
    <div class="booklist" v-for="book in books">
        <p class="booklist_title">{{ book.Item.title }}</p>
        <p class="booklist_img">
            <!-- 画像データがなければダミー画像表示するv-if -->
            <span v-if="book.Item.largeImageUrl"><img :src="book.Item.largeImageUrl" alt=""></span>
            <span v-else><img :src="dummy" alt=""></span>
        </p>
        <div class="booklist_others">
            <p class="booklist_author">著者：{{ book.Item.author }}</p>
            <p class="booklist_publisher">出版社：{{ book.Item.publisherName }}</p>
            <p class="booklist_isbn">ISBN：{{ book.Item.isbn }}</p>
            <p class="booklist_summary">{{ book.Item.itemCaption }}</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="`#isbn${book.Item.isbn}`">
                この本を登録する
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" v-bind:id="`isbn${book.Item.isbn}`" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ book.Item.title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="booklist">
                            <p class="booklist_title">{{ book.Item.title }}</p>
                            <p class="booklist_img">
                                <!-- 画像データがなければダミー画像表示するv-if -->
                                <span v-if="book.Item.largeImageUrl"><img :src="book.Item.largeImageUrl" alt=""></span>
                                <span v-else><img :src="dummy" alt=""></span>
                            </p>
                            <div class="booklist_others">
                                <p class="booklist_author">著者：{{ book.Item.author }}</p>
                                <p class="booklist_publisher">出版社：{{ book.Item.publisherName }}</p>
                                <p class="booklist_isbn">ISBN：{{ book.Item.isbn }}</p>
                                <p class="booklist_summary">{{ book.Item.itemCaption }}</p>
                            </div>
                            <label for="title">ジャンル</label>
                            <input type="text" class="form-control" id="title" v-model="gunre">
                            <label for="title">感想</label>
                            <textarea class="form-control" id="myReview" style="height: 150px"
                                v-model="myReview"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="addBook(book)"
                            data-bs-dismiss="modal">登録する</button>
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
            title: '',
            author: '',
            books: [],
            gunre: '',
            myReview: '',
            dummy: '/images/bookicon.png',
        }
    },
    methods: {
        // clickイベントの発火時に動作するメソッド
        async send() {
            const url = "/api/books";
            // axios.post('送信先のurl','データ')
            const response = await axios.post(url, this.books);
            console.log(response);
        },
        async getRakutenAPI() {
            const res = await axios.get('/api/books/getRakutenAPI', {
                params: {
                    title: this.title,
                    author: this.author,
                }
            });
            this.books = res.data.Items;
        },
        async addBook(book) {
            const url = '/api/books';

            const Book = {
                title: book.Item.title,
                author: book.Item.author,
                publisherName: book.Item.publisherName,
                isbn: book.Item.isbn,
                itemCaption: book.Item.itemCaption,
                gunre: this.gunre,
                myReview: this.myReview,
                largeImageUrl: book.Item.largeImageUrl,
                available: true,
            }
            await axios.post(url, Book);
            this.$router.push('/');
        },
    }
}
</script>