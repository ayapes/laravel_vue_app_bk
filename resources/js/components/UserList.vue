<template>
<h3>ユーザー一覧</h3>
    <ul v-for="user in users" class="list-group list-group-horizontal w-50">
        <li class="list-group-item w-50 p-2">{{ user.name }}</li>
        <li class="list-group-item w-50 p-2">{{ user.email }}</li>
    </ul>
</template>

<script>
import axios from "axios";

export default {
    name: 'Users',

    data(){
      return {
        users:'',
      }
    },
    async mounted() {
        const url_u = "/api/users";
        const response_u = await axios.get(url_u);
        this.users = response_u.data;
    }
}
</script>