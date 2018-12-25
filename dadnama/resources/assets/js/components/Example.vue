<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>

                    <div class="panel-footer">
                       <button v-on:click="greet">Greet</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  mounted() {
    greet: event => {
      // `this` inside methods points to the Vue instance
      alert("Hello !");
     
    };
  }
};
</script>
