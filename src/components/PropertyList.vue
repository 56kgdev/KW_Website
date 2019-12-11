<template>
    <div id="contain_tarjet_property" class="item col-md-4">
        <!-- Set width to 4 columns for grid view mode only -->
        <div class="image">
            <a>				
                <a @click="goToProperty(property.propertyid, property.nameproperty)" class="btn btn-default"><i class="fa fa-file-o"></i> Detalles</a>				
            </a>
            <img :src="property.smallphoto" :alt="property.nameproperty" />
        </div>

        <div class="price" v-if="property.price >0">
            <i class="fa fa-home"></i>En venta
            <span style="color:#fff;">${{ property.price | format }} {{ property.currenname }}</span>
        </div>
        <div class="price" v-else-if="property.pricepermonth>0">
            <i class="fa fa-home"></i>En renta
            <span style="color:#fff;">${{ property.pricepermonth | format}} {{ property.currennamePerMonth}}</span>
        </div>
        <div class="price" v-else-if="property.holiday_price!=0">
            <i class="fa fa-home"></i>Renta vacacional
            <span style="color:#fff;">${{ property.holiday_price | format}} {{ property.vacation_rental_currency}}</span>
        </div>

        <div class="info">
            <h3>
                <a style="color:rgb(54, 52, 53); cursor:pointer;" @click="goToProperty(property.propertyid, property.nameproperty)">

                    {{ property.nameproperty }}

                </a>
                <small>{{ property.neighbourhood }}, {{ property.city}}</small>
            </h3>
            <p>{{ property.onlinewebspa | truncate}}</p>
            <ul class="amenities">
                <li v-if="property.m2c != 0"><i class="icon-area"></i> {{ property.m2c | format }} m<sup>2</sup></li>
                <li v-else-if="property.mlot != 0"><i class="icon-area"></i> {{ property.mlot | format }} m<sup>2</sup></li>
                <li v-if="property.bedrooms!='0'" ><i class="icon-bedrooms"></i> {{ property.bedrooms }}</li>
                <li v-if="property.bathrooms!='0'" ><i class="icon-bathrooms"></i> {{ property.bathrooms }}</li>
            </ul>
        </div>
    </div>
    <!--- END COL -->
</template>

<script>
    import numeral from 'numeral'
    import immoService from '@/services/immo.js'
    export default {
        props: {
            property: {
                type: Object,
                required: true
            }

        },

        filters: {
            truncate: function (str) {
                return str.substring(0, 125) + '...'
            },
            format: function (value) {
                return numeral(value).format('0,0')
            }
        },

        methods: {
            selectProperty() {
                this.$emit('select', this.property.propertyid)

            },

            goToProperty(id, name) {
                let namePropFilt=immoService.normalize(name);
                this.$router.push({
                    name: 'property',
                    params: {
                        id,
                        namePropFilt
                    }
                })

            }
        }

    }
</script>

<style scoped>
    img {
        width: 100%;
    }

    @media (max-width: 992px) {
        #contain_tarjet_property {
            width: 65%;
        }
    }

    @media (max-width: 520px) {
        #contain_tarjet_property {
            width: 100%;
        }
    }
</style>
