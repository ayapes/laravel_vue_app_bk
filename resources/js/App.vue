<template>
    
    <nav id="nav_menu">
        <div><h1>本の貸し出しデータベース</h1></div>
        <div>
            <ul class="nav_ul">
            <li class="nav_li">
                <router-link to="/" class="nav_link">HOME</router-link>
            </li>
            <li class="nav_li">
                <router-link to="/user" class="nav_link">ユーザー</router-link>
            </li>
            <li class="nav_li">
                <router-link to="/books" class="nav_link">登録書籍一覧</router-link>
            </li>
            <li class="nav_li">
                <router-link to="/search" class="nav_link">書籍検索</router-link>
            </li>
            <li class="nav_li">
                <router-link to="/add" class="nav_link">書籍新規登録</router-link>
            </li>
            <li class="nav_li">
                <router-link to="/test" class="nav_link">TEST</router-link>
            </li>
        </ul>
        </div>
        
    </nav>
    <div id="wrapper">
<router-view></router-view>

</div>
</template>

<script>
export default {
    name: 'App',
}
</script>
<style>

</style>
