<template>
    <div>
        <div class="card">
            <div style="max-height: 200px; height: 200px; overflow: hidden">
                <img :src="`/storage/${listing.images[0].file_path}`" class="card-img-top" :alt="listing.name">
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ listing.name }}</h4>
                <hr>
                <div class="badge badge-primary mr-1" v-for="(category, index) in listing.categories" :key="index">
                    {{ category.name }}
                </div>
                <hr>
                <a :href="`mailto:${listing.email}`">{{listing.email}}</a>
                <hr>
                <a :href="`${listing.website_url}`">{{listing.website_url}}</a>
                <hr>
                {{listing.address}}
                <hr>
                <template v-for="(phone, index) in listing.phones">
                    <a :href="`tel:${phone.phone}`" class="badge badge-light">
                        {{phone.phone}}
                    </a>
                </template>
                <hr>
                <h5>Description</h5>
                {{listing.description}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListingItem",
        props: ['listing']
    };
</script>

<style scoped>

</style>
