Vue.component('comment-section', {
    props: {
        comments: {
            type: Array
        },
        slug: ''
    },
    /* Template for the comments form */
    template: `
        <div>
            <div class='card-footer w-100 text-muted'>
                <div class="card mb-2">
                    <h5 class="card-header">Comment</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <textarea class="form-control" aria-label="With textarea" v-model="UserComment"></textarea>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Submit" @click="addComment">
                        </div>
                    </div>
                </div>
            </div>
            <div class='card-footer w-100 text-muted'>
                <h4>Comments: </h4>
                <div class="list-group">
                    <div class="card mb-2" v-for="comment in comments">
                        <h5 class="card-header">{{ comment.UserName }}</h5>
                        <div class="card-body">
                            <p class="card-text">{{ comment.UserComment }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `,
    data() {
        return {
            UserComment: '',
            UserName: ''
        }
    },
    methods: {
        /* Add the comment */
        addComment() {
            console.log(this.comments);
            console.log(this.slug);
            //Get the username and trim away the cookie
            this.UserName = document.cookie.replace("active_user=", "");
            //Check if the user exists or the comment and if not dont return anything
            if((this.UserComment.trim() === '') || (this.UserName === '')) {
                return;
            }
            //Reverse the array to place the new comment at the bottom as most recent
            this.comments.reverse();
            //Add the new comment with the user
            this.comments.push({
                UserName: this.UserName,
                UserComment: this.UserComment
            });
            //Reverse again to make it so the last input is at the top
            this.comments.reverse();
            //Reset the input field

            $.post("http://localhost/gamesReview/scripts/addCommentToDB.php", {username: this.UserName, comment: this.UserComment, gamename: this.slug});

            this.UserComment = '';
        }
    }
});


new Vue({
    el: "#comment-element",
    data: {
        comments: [],
        slug: ''
    }
});