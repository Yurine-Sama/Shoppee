<template>
    <v-app>
        <v-carousel>
        <v-carousel-item
        v-for="(item,i) in items"
        :key="i"
        :src="item.src"
        reverse-transition="fade-transition"
        transition="fade-transition"
        ></v-carousel-item>
    </v-carousel>
    
            <v-container fluid>
        <v-row dense>
            <v-col
            v-for="product in Product"
            :key="product.id"
            :cols="3"
            >
            <v-card>
                <v-img
        
                class="white--text align-end"
                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                height="200px"
                >
                <v-card-title v-text="product.name"></v-card-title>
                </v-img>

                <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn icon>
                    <v-icon>mdi-account</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-bookmark</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-share-variant</v-icon>
                </v-btn>
                </v-card-actions>
            </v-card>
            </v-col>
        </v-row>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        data() {
            return{
                Product: [],
                product: null,
                items: [
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg',
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg',
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg',
                    },
                    ],
            }
        },    
        mounted() {
            this.initialize()
            console.log('Initialized.')
        },
        methods:{
            initialize(){   
                axios.get('api/product')
                    .then(response => {
                        if(response.data.success == true){
                            this.Product = response.data.Product
                            console.log(response.data);
                        }else{
                            console.log('fail to get data.');
                        }
                    })
                    .catch(err => {
                        console.log("error");
                    })
            },
        }
    }
</script>
