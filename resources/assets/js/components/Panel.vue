<template>
    <div v-bind:class="defineColor">
        <div class="panel-heading">{{ title }}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['title', 'color'],
        computed:{
            defineColor: function () {
                return "panel " + (this.color || "panel-default");
            }
        }
    }
</script>

<style media="screen">
    .blue {
        border-color: #020776
    }

    .blue > .panel-heading {
        color: #f9fdff;
        background-color: #020776;
        border-color: #020776;
    }

    .orange {
        border-color: #f69118
    }

    .orange > .panel-heading {
        color: #f9fdff;
        background-color: #f69118;
        border-color: #f69118;
    }
</style>