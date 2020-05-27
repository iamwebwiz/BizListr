<template>
    <div>
        <div class="form-group">
            <input type="text" class="form-control" v-model="searchString" @input="searchListings">
        </div>
        <hr>
        <template v-if="! searchString">
            <template v-if="! listings.length">There are no listings yet.</template>
            <template v-else>
                <div class="row">
                    <div class="col-md-4" v-for="(listing, index) in listings" :key="index">
                        <ListingItem :listing="listing" />
                    </div>
                </div>
            </template>
        </template>
        <template v-else>
            <template v-if="! searchResults.length">There are no matching listings.</template>
            <template v-else>
                <div class="row">
                    <div class="col-md-4" v-for="(listing, index) in searchResults" :key="index">
                        <ListingItem :listing="listing" />
                    </div>
                </div>
            </template>
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
            listings: [],
            searchString: '',
            searchResults: []
        }),
        mounted() {
            this.fetchListings()
        },
        methods: {
            fetchListings() {
                axios.get('/api/listings').then(res => {
                    this.listings = res.data
                }).catch(err => console.error(err.response.data))
            },
            searchListings() {
                axios.post('/api/search', {
                    search: this.searchString
                }).then(res => {
                    this.searchResults = res.data
                }).catch(err => console.error(err.response.data))
            }
        }
    }
</script>

<style scoped>

</style>
