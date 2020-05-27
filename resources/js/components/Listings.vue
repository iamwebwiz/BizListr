<template>
    <div>
        <template v-if="! listings.length">There are no listings yet.</template>
        <template v-else>
            <div class="row">
                <div class="col-md-4" v-for="(listing, index) in listings" :key="index">
                    <ListingItem :listing="listing" />
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import ListingItem from "./ListingItem"

    export default {
        name: "Listings",
        components: {
            ListingItem
        },
        data: () => ({
            'listings': []
        }),
        mounted() {
            this.fetchListings()
        },
        methods: {
            fetchListings() {
                axios.get('/api/listings').then(res => {
                    this.listings = res.data
                }).catch(err => console.log(err.response.data))
            }
        }
    }
</script>

<style scoped>

</style>
