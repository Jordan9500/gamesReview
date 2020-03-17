Vue.component('comment-section', {
    template: ` 
    <div class="container">
        <h1>Comments</h1>
        <hr/>
        <div class="form-todo form-group">
            <p>
                <textarea placeholder="Comment" name="usercomment" class="form-control" v-model="usercomment"></textarea>
            </p>

            <button v-on:click="addComment" type="submit" class="btn btn-primary">Comment</button>
        </div>

        <div class="list-group">
            <div class="list-group-item" v-for="(usercomment, index) in allComments" >
                <span>Username: <strong> {{ usercomment.username }}</strong></span>
                <p>{{ usercomment.usercomment }}</p>
                <div>
                    <a href="#" title="Excluir" v-on:click.prevent="removeComment(index)">Delete</a>
                </div>
            </div>
        </div>
        <hr/>
    </div>
    `, 
    props: {
        username: ''
    },
    data(){
        return{
            usercomments: [],
            usercomment: ''
        }
    }, 
    methods: {
        addComment(){
            if(this.usercomment.trim() === ''){
                return;
            }

            this.usercomments.push({
                username: this.username,
                usercomment: this.usercomment
            });

            this.usercomment = '';
        },
        removeComment(index){
            this.usercomments.splice(index, 1);
        }
    },
    computed: {
        allComments(){
            return this.usercomments.map(usercomment => ({
                ...usercomment,
            }))
        }
    }, 
    watch: {
        usercomments(val){
            console.log('val', val);
        }
    }
})


new Vue({
    el: '#app',
    data: {
        username: ''
    }

})