import dashboard from './components/dashboard.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import signin from './components/signin.vue';
export const routes=[
            {path: '/dashboard', component: dashboard, props:true},
            {path: '/add', component: ExampleComponent},
            {path: '/login', component:signin}
          ];
