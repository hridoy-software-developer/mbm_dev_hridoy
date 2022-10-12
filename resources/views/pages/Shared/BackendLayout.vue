<template>
    <BaseLayout>
        <div class="dash">
            <Sidebar />
            <div class="dash-app">
                <Header />
                <main class="dash-content">
                    <slot/>
                </main>
            </div>
        </div>
    </BaseLayout>
</template>	