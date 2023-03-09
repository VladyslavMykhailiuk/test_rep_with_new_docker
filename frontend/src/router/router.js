import MainPage from "@/Pages/MainPage.vue";
import PostFormPage from "@/Pages/PostFormPage.vue";
import { createRouter, createWebHashHistory } from "vue-router";
import LoginPage from "@/Pages/LoginPage.vue";
import RegisterPage from "@/Pages/RegisterPage.vue";
import PostsListPage from "@/Pages/PostsListPage.vue";
import OnePost from "@/components/OnePost.vue";
import EditPostPage from "@/Pages/EditPostPage.vue";
const routes = [
    {
        path: "/",
        component: MainPage
    },
    {
        path: "/login",
        component: LoginPage
    },
    {
        path: "/register",
        component: RegisterPage
    },
    {
        path: "/form",
        component: PostFormPage,
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: "/posts",
        component: PostsListPage,
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/post/:id',
        name: 'post',
        component: OnePost,
        props: true,
    },
    {
        path: '/post/:id/edit',
        component: EditPostPage,
    },
]


const router = createRouter({
    routes,
    history: createWebHashHistory(process.env.BASE_URL)
})



router.beforeEach(async (to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    // const store = useAuthStore();
    if (requiresAuth && !localStorage.getItem('auth')) {
        next('/login');
    } else {
        next();
    }
})


export default router;