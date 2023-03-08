<template>
    <div>
        HomeView一行だけ
    </div>
    <div>
        <star-rating @rating-selected="setRating" v-bind:increment="1" v-bind:max-rating="5" inactive-color="#ccc"
            active-color="yellow" v-bind:star-size="20" :show-rating="false" :rating="this.score"></star-rating>

        //このinputに評価の値を入れる
        <input type="hidden" name="score" :value="this.rating" />
    </div>
</template>
<script>
export default {
    name: 'Home',
    props: [],
    data() {
        return {
            rating: 0,
        }
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
}
</script>