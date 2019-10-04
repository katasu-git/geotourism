import Vue from "vue";
import VueRouter from "vue-router";
import Top from "./views/Top";


Vue.use(VueRouter);
const routes = [
    {
        path: "/",
        name: "top",
        component: Top
    }
];

export default new VueRouter({
    routes: routes
})