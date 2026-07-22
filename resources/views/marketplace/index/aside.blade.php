<aside class="lg:col-span-1 space-y-6">
    <x-category-sidebar :categories="$categories" :category="$category" index-route="marketplace.index" category-route="marketplace.category" />
    @include('marketplace.index.aside-users')
</aside>
