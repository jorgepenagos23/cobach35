<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>
    <div>
        <banner></banner>
    </div>
    <v-app>
        <v-container>
            <v-card class="mt-5">
                <v-carousel height="460" width="800" show-arrows hide-delimiter-background>
                    <template v-slot:prev="{ props }"></template>
                    <v-carousel-item v-for="(slide, i) in slides" :key="i">
                        <v-sheet :color="colors[i]" height="100%">
                            <v-img :src="slide.url" height="200%" class="object-cover w-full h-full rounded"></v-img>

                        </v-sheet>
                    </v-carousel-item>
                </v-carousel>
            </v-card>


        </v-container>

        <body>
            <!-- section  -->
            <div v-for="publicacion in list" :key="publicacion.id"
     class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-white sm:py-12">
    <div class="items-center w-full max-w-screen-xl mx-auto">
        <div class="relative block w-full p-4 text-base leading-5 text-white opacity-100 rounded-xl group-hover:bg-lime-600 bg-teal-950 font-regular">{{ publicacion.titulo }}</div>
        <div class="grid h-full grid-cols-1 gap-6 md:grid-cols-2">
            
    <div class="h-full px-2 py-3 transition-all bg-white w-50 botom-3 md:w-4/6 md:px-2 rounded-xl group-hover:bg-sky-600">
        <h2 class="w-full text-3xl font-bold text-left text-white"></h2>    </div>

            <br>
            <div>
                <div class=" rounded-xl">
                    <img :src="publicacion.imagen" alt="Imagen" class="object-cover w-full rounded h-96">
                </div>
            </div>
            <div class="md:pr-3">
                <p class="mb-6 text-justify text-black peer">
                    <v-card class="mx-auto" max-width="1200" color="black" variant="tonal">
                        <v-card-item>
                            <div>
                                <div class="mb-1 text-overline"></div>
                                <p class="mt-6 text-lg leading-8 text-gray-600">{{ publicacion.descripcion }}</p>
                            </div>
                        </v-card-item>
                        <v-card-actions></v-card-actions>
                    </v-card>
                </p>
            </div>
        </div>
    </div>
</div>


<infinite-loading @infinite="infiniteHandler" class="my-4">
    <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md">
        Cargar más
    </button>
</infinite-loading>

            <br><br>
            <v-row align="center" justify="center">
                <v-col cols="auto">

                    <v-card class="mx-auto" max-width="344" title="Valores 1" subtitle="prepend-icon and append-icon"
                        prepend-icon="mdi-account" append-icon="mdi-check">


                        <v-card-text>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="auto">
                    <v-card class="mx-auto" max-width="344" title="Valores 2" subtitle="prepend and append">
                        <template v-slot:prepend>
                            <v-icon icon="mdi-account" color="primary"></v-icon>
                        </template>
                        <template v-slot:append>
                            <v-icon icon="mdi-check" color="success"></v-icon>
                        </template>
                        <v-card-text>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="auto">
                    <v-card class="mx-auto" max-width="344" title="Valores 3" subtitle="prepend-avatar and append-avatar"
                        prepend-avatar="https://cdn.vuetifyjs.com/images/logos/v-alt.svg"
                        append-avatar="https://cdn.vuetifyjs.com/images/john.jpg">
                        <v-card-text>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="auto">
                    <v-card class="mx-auto" max-width="344" title="Valores 4" subtitle="prepend and append">
                        <template v-slot:prepend>
                            <v-avatar color="blue-darken-2">
                                <v-icon icon="mdi-alarm"></v-icon>
                            </v-avatar>
                        </template>
                        <template v-slot:append>
                            <v-avatar size="24">
                                <v-img src="https://cdn.vuetifyjs.com/images/john.png" alt="John"></v-img>
                            </v-avatar>
                        </template>
                        <v-card-text>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</v-card-text>
                    </v-card>
                </v-col>
            </v-row>


        </body>




    </v-app>
</template>
  
<style>
.centered-content {
    display: flex;
    text-align: center;
    justify-content: center;
    height: auto;
}

@media only screen and (max-width: 600px) {
    .text-h2 {
        font-size: 1.5rem;
    }
}
</style>
  
<script>
import axios from 'axios';
import banner from "../.././components/inicio.vue";
import pie from "../.././components/footer.vue";
import Swal from 'sweetalert2';

const api = '/api/v1/publicacion';

export default {
    name: 'mision',
    components: {
        banner,
        pie,
    },
    data() {
        return {
            page: 1,
            list: [],
            isLoading: false,
            hasMoreResults: true,
            publicaciones: [],
            currentIndex: 0,
            posts: [],
            contenido: [],
            subsecciones: {},
            subseccionesContenidoFiltrado: [],
            componentRuta: '',
            colors: [
                'white',
                'white',

            ],
            slides: [
                { title: 'First', url: 'https://scontent.ftgz1-1.fna.fbcdn.net/v/t1.6435-9/51929161_1997642960535831_2328698321197072384_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=755d08&_nc_eui2=AeGpxHOYLPxGKT0wmlPMOgQwKoD6vWtBkMAqgPq9a0GQwF4-l0d-THD-ZRIXG3uvP2QDjC2qY8tm-vVtfPrRGlQI&_nc_ohc=IKG0BOXqaPsAX9eqt4Z&_nc_ht=scontent.ftgz1-1.fna&oh=00_AfCd27xmSLpEe0JRwdiV0obvT98f9REA5RYO6wTiDy6lvg&oe=65D1916C' },
                { title: 'Second', url: 'https://scontent.ftgz1-1.fna.fbcdn.net/v/t1.6435-9/51929161_1997642960535831_2328698321197072384_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=755d08&_nc_eui2=AeGpxHOYLPxGKT0wmlPMOgQwKoD6vWtBkMAqgPq9a0GQwF4-l0d-THD-ZRIXG3uvP2QDjC2qY8tm-vVtfPrRGlQI&_nc_ohc=IKG0BOXqaPsAX9eqt4Z&_nc_ht=scontent.ftgz1-1.fna&oh=00_AfCd27xmSLpEe0JRwdiV0obvT98f9REA5RYO6wTiDy6lvg&oe=65D1916C' },
                { title: 'Third', url: 'URL_DE_LA_IMAGEN_3' },
            ],
        };
    },
    created() {
        this.cargarPublicaciones();
        this.componentRuta = this.$route.path;
        this.fetchData();
    },
    methods: {
        infiniteHandler($state) {
            if (this.isLoading) {
                return;
            }

            this.isLoading = true;

            axios.get(api, {
                params: {
                    page: this.page,
                },
            }).then((response) => {
                if (response.data.publicaciones.length) {
                    this.page += 1;
                    const newPublicaciones = response.data.publicaciones.sort((a, b) => {
                        return new Date(b.fecha) - new Date(a.fecha);
                    });
                    this.list.push(...newPublicaciones);
                    this.isLoading = false;
                    console.log("solicitando más información");

                    $state.loaded();

                    if (this.list.length >= response.data.total) {
                        this.hasMoreResults = false;
                        $state.complete();
                    }
                } else {
                    console.log("has llegado al final del contenido");
                    this.isLoading = false;
                    this.hasMoreResults = false;
                    $state.complete();
                }
            });
        },

        cargarPublicaciones() {
            axios.get('/api/v1/publicacion')
                .then((response) => {
                    console.log(response);
                    this.publicaciones = response.data.publicaciones.sort((a, b) => {
                        return new Date(b.fecha) - new Date(a.fecha);
                    });
                    console.log(this.publicaciones);
                })
                .catch((error) => {
                    console.error('Error al cargar las publicaciones:', error);
                });
        },

        formatDate(isoDate) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                timeZone: 'UTC'
            };
            return new Date(isoDate).toLocaleString('es-es', options);
        },

        fetchData() {
            axios.all([
                axios.get('/api/v1/contenido'),
                axios.get('/api/v1/fachada_subseccion')
            ])
                .then(axios.spread((response1, response2) => {
                    console.log('Datos de contenido:', response1.data.contenido);
                    console.log('Datos de subsecciones:', response2.data.subsecciones);

                    this.contenido = response1.data.contenido;
                    this.subsecciones = response2.data.subsecciones;
                    this.filterContenido();
                }))
                .catch(error => {
                    console.error('Error al obtener datos de la API', error);
                });
        },

        filterContenido() {
            if (this.contenido && this.subsecciones) {
                // Obtiene la ruta actual
                const rutaActual = this.$route.path;

                console.log('Ruta actual:', rutaActual);

                this.subseccionesContenidoFiltrado = Object.values(this.subsecciones).map(seccion => {
                    const contenidoRelacionado = this.contenido.find(cont => cont.id === seccion.contenido_id);
                    return {
                        seccion,
                        contenido: contenidoRelacionado,
                    };
                }).filter(data => data.seccion.ruta === rutaActual);

                console.log('Contenido filtrado:', this.subseccionesContenidoFiltrado);
            }
        },
    },
};
</script>
