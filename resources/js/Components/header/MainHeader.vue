<script setup>
import placeHolder from "~icons/placeholder.svg";
import placeHolderDark from "~icons/logo-dark.svg";
import {Link} from '@inertiajs/vue3';
import {ref, onMounted, onBeforeUnmount} from "vue";

const isOpen = ref(false);

const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};

const dropdownStates = ref({});

const toggleDropdown = (id) => {
    const newStates = {...dropdownStates.value};

    Object.keys(newStates).forEach((key) => {
        newStates[key] = false;
    });

    newStates[id] = !dropdownStates.value[id];

    dropdownStates.value = newStates;
};

const handleClickOutside = (event) => {
    if (!event.target.closest(".header-ddown")) {
        dropdownStates.value = Object.keys(dropdownStates.value).reduce(
            (acc, key) => {
                acc[key] = false;
                return acc;
            },
            {}
        );
    }
};


onMounted(() => window.addEventListener("click", handleClickOutside));
onBeforeUnmount(() => window.removeEventListener("click", handleClickOutside));

onMounted(() => {
    window.addEventListener("click", handleClickOutside);
});

onBeforeUnmount(() => {
    window.removeEventListener("click", handleClickOutside);
});
</script>

<template>
    <header class="section header" :class="{ open: isOpen }">
        <div class="container container-big">
            <div
                class="d-flex flex-row justify-content-between align-items-center col-12"
            >
                <a class="mobile-toggle" href="#" @click.prevent="toggleMenu">
                    <div class="mobile-toggle-inner">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <Link :href="route('home')" class="header-logo"
                ><img
                    class="d-none d-lg-flex"
                    :src="placeHolderDark"
                    alt=""/>
                    <img class="d-lg-none" :src="placeHolder" alt=""
                    /></Link>
                <nav class="header-nav d-none d-lg-flex">
                    <ul>
                        <li>
                            <Link :href="route('home')"><span>Home</span></Link>
                        </li>
                        <li>
                            <Link :href="route('blog')"><span>Blog</span></Link>
                        </li>
                        <li>
                            <Link :href="route('blog')"><span>Single</span></Link>
                        </li>
                        <li>
                            <Link :href="route('contact')"><span>Kontakt</span></Link>
                        </li>
                        <li>
                            <Link :href="route('ce')"><span>CE</span></Link>
                        </li>
                        <li class="desk-dropdown">
                            <span class="desk-dropdown-toggle"
                            ><span>Toggle</span>
                                <i class="fa fa-chevron-right"></i>
                            </span>
                            <ul class="dropdown-content">
                                <li><a href="">subitem</a></li>
                                <li><a href="">subitem2</a></li>
                                <li><a href="">subitem3</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="d-none d-lg-flex align-items-center">
                    <div class="d-flex align-items-center mr-30px"></div>

                    <Link :href="route('login')" class="hover-primary header-login">
                        <i class="fa fa-user text-primary mr-8px"></i>Login
                    </Link>
                    <span class="divider divider-dark"></span>

                    <Link :href="route('register')" class="hover-primary header-login">
                        <i class="fa fa-arrow-right text-primary mr-8px"></i>
                        Register
                    </Link>
                    <a
                        href="/makeanevent"
                        class="ml-30px btn btn-header btn-hovprim"
                    >+ Create event</a
                    >
                </div>
                <div class="header-search">
                    <i class="fa fa-search"/>
                </div>
                <div class="mobile-nav__overlay"></div>
                <div class="mobile-nav">
                    <a
                        class="mobile-toggle mobile-toggle-innav"
                        href="#"
                        @click.prevent="toggleMenu"
                    >
                        <div class="mobile-toggle-inner">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>

                    <div class="mobile-nav__content">
                        <div class="container flex-column">
                            <a class="header-logo mb-30px" href="/">
                                <img :src="placeHolder" alt=""/>
                            </a>
                            <nav class="header-nav">
                                <ul class="header-list">
                                    <li>
                                        <Link :href="route('home')">Home</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('blog')">Blog</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('blog')">Single</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('contact')">Kontakt</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('ce')">CE</Link>
                                    </li>
                                    <ul class="header-ddown">
                                        <li
                                            class="header-ddown-toggle"
                                            :class="{ show: dropdownStates.d1 }"
                                            @click.stop="toggleDropdown('d1')"
                                        >
                                            Toggle 1
                                            <i class="fa fa-chevron-right"></i>
                                        </li>
                                        <li
                                            class="ddown-content"
                                            :class="{ show: dropdownStates.d1 }"
                                        >
                                            <ul>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="header-ddown">
                                        <li
                                            class="header-ddown-toggle"
                                            @click.stop="toggleDropdown('d2')"
                                            :class="{ show: dropdownStates.d2 }"
                                        >
                                            Toggle 1
                                            <i class="fa fa-chevron-right"></i>
                                        </li>
                                        <li
                                            class="ddown-content"
                                            :class="{ show: dropdownStates.d2 }"
                                        >
                                            <ul>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                                <li>
                                                    <a href="#">About us</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<style lang="scss" scoped>
.header {
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    background-color: var(--text);
    border-style: solid;
    border-width: 0px 0px 1px 0px;
    border-color: #161a1d;
    @include media-breakpoint-up(lg) {
        background-color: white;
        padding: 0 30px;
    }

    &-mobile {
        @include media-breakpoint-up(lg) {
            display: none;
        }
    }

    .container {
        padding: 0;
    }

    &.open {
        .mobile-nav {
            transform: translate(0) !important;
            overflow-x: visible;
        }

        .mobile-nav__overlay {
            opacity: 1;
            visibility: visible;
        }
    }
}

.header-logo {
    width: 150px;
    height: 30px;
    @include media-breakpoint-up(lg) {
        width: auto;
        height: 40px;
    }
    @media screen and (min-width: 1000px) and (max-width: 1200px) {
        width: 150px;
        img {
            object-fit: contain;
        }
    }

    img {
        height: 100%;
    }
}

.header-nav {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    @include media-breakpoint-up(lg) {
        flex-direction: row;
        align-items: center;
        height: 90px;
    }

    ul {
        display: flex;
        flex-direction: column;
        @include media-breakpoint-up(lg) {
            flex-direction: row;
        }

        align-items: stretch;
        height: 100%;
        width: 100%;

        li {
            height: 100%;

            a {
                font-size: 14px;
                @media screen and (min-width: 1000px) and (max-width: 1200px) {
                    font-size: 12px;
                }
                letter-spacing: 0.14px;
                transition: all 0.4s;
                font-weight: 400;
                line-height: 18px;
                padding: 4px 0;
                color: white;
                width: 100%;
                font-family: "Krona One";
                text-transform: capitalize;

                @include media-breakpoint-up(lg) {
                    padding: 0 13px;
                    color: var(--text);
                }

                height: 100%;
                display: flex;
                align-items: center;

                &:hover {
                    color: var(--primary);
                }
            }
        }

        li:not(:last-of-type) {
            margin-bottom: 10px;
            @include media-breakpoint-up(lg) {
                margin-bottom: 0;
            }
        }
    }
}

.header-search {
    color: white;
    @include media-breakpoint-up(lg) {
        display: none;
    }

    i {
        font-size: 20px;
    }
}

.mobile-toggle {
    padding: 12px 10px;
    margin-left: -20px;
    display: flex;
    justify-content: center;
    align-items: center;
    @include media-breakpoint-up(lg) {
        display: none;
    }

    .fa {
        font-size: 20px;
    }

    &-innav {
        position: absolute;
        top: 10px;
        right: -45px;
        background-color: var(--text);
        margin-left: 0;
    }

    .mobile-toggle-inner {
        display: flex;
        flex-direction: column;
        row-gap: 5px;

        span {
            display: inline-block;
            position: relative;
            width: 20px;
            height: 2px;
            vertical-align: top;
            background: white;

            &:first-of-type {
                animation: ease 0.7s 0.4s bar-top-2 backwards;
            }

            &:nth-of-type(2) {
                animation: ease 0.7s 0.4s bar-scaled-2 backwards;
            }

            &:nth-of-type(3) {
                animation: ease 0.7s 0.4s bar-bottom-2 backwards;
            }
        }
    }
}

.header.open {
    .mobile-toggle-inner {
        span {
            &:first-of-type {
                animation: ease 0.7s 0.4s bar-top forwards;
            }

            &:nth-of-type(2) {
                animation: ease 0.7s 0.4s bar-scaled forwards;
            }

            &:nth-of-type(3) {
                animation: ease 0.7s 0.4s bar-bottom forwards;
            }
        }
    }
}

.mobile-nav {
    display: flex;
    position: fixed;
    overflow-x: hidden;
    transition: transform 0.45s ease-in-out;
    z-index: 999;
    left: 0;
    right: auto;
    top: 0;
    transform: translate(-100%);
    bottom: 0;
    height: 100vh;
    background-color: var(--text);
    width: calc(100% - 48px);
    @include media-breakpoint-up(lg) {
        display: none;
    }

    &__overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        background-color: rgba(0, 0, 0, 0.3);
        visibility: hidden;
        opacity: 0;
        transition: 0.45s ease-in-out;
        background-color: #161a1dcc;
    }

    &__content {
        width: 100%;
        display: flex;
        flex-direction: column;
        padding: 30px;
    }
}

.header-nav {
    ul.header-ddown {
        color: white;
        @media screen and (min-width: 1000px) and (max-width: 1200px) {
            font-size: 12px;
        }
        font-size: 14px;
        transition: all 0.4s;
        padding: 4px 0;
        color: white;
        width: 100%;
        font-family: "Krona One";
        font-weight: 400;
        @include media-breakpoint-up(lg) {
            padding: 0 13px;
            color: var(--text);
        }

        li.header-ddown-toggle {
            height: auto !important;
            margin-bottom: 0;
            position: relative;

            .fa {
                position: absolute;
                top: 50%;
                transform: trasnlateY(-50%);
                right: 10px;
                font-size: 12px;
                width: 12px;
                height: 12px;
                transform: translateY(-50%);
                transition: all 0.3s ease;
            }

            &.show {
                .fa {
                    transform: translateY(-50%) rotate(90deg);
                }
            }
        }

        .ddown-content {
            display: flex;
            padding: 0 0 0 20px;
            overflow: hidden;
            position: relative;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            min-width: auto;
            font-family: inherit;
            font-size: inherit;
            max-height: 0;
            transition: max-height 0.5s ease;

            &.show {
                max-height: 1000px;
            }
        }

        li {
            height: auto;
            margin-bottom: 0;

            a {
                line-height: 30px;
            }
        }
    }
}

.header-login {
    font-family: "Krona one";
    white-space: nowrap;
    @media screen and (min-width: 1000px) and (max-width: 1200px) {
        font-size: 12px;
    }
    font-size: 14px;
}

.btn-header {
    background-color: var(--primary);
    font-size: 14px;
    font-weight: 500;
    color: white;
    border-radius: 5px 5px 5px 5px;
    padding: 10px 25px 10px 30px;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    border-color: var(--primary);
    white-space: nowrap;
}

.desk-dropdown {
    position: relative;
    display: flex;
    align-items: center;

    .desk-dropdown-toggle {
        @media screen and (min-width: 1000px) and (max-width: 1200px) {
            font-size: 12px;
        }
        font-size: 14px;
        letter-spacing: 0.14px;
        transition: all 0.4s;
        font-weight: 400;
        line-height: 18px;
        padding: 4px 0;
        color: white;
        width: 100%;
        font-family: "Krona One";
        text-transform: capitalize;
        cursor: pointer;
        display: flex;
        align-items: center;

        &:hover {
            color: var(--primary);

            .fa {
                color: var(--primary);
            }
        }

        @include media-breakpoint-up(lg) {
            padding: 0 13px;
            color: var(--text);
        }

        span {
            margin-right: 7px;
        }

        .fa {
            position: relative;
            z-index: 1;
            font-size: 9px;
            font-style: normal;
            transform: rotate(90deg);
            transform-origin: center;
            perspective-origin: center;
            transition: all 0.3s ease;
        }
    }

    .dropdown-content {
        display: flex;
        flex-direction: column;
        position: absolute;
        background-color: var(--text);
        z-index: 1;
        left: -4px;
        min-width: 260px;
        white-space: nowrap;
        margin: 0;
        padding: 30px 0 28px;
        text-align: left;
        transition: 0.3s ease-out;
        height: fit-content;
        visibility: hidden;
        opacity: 0;
        top: calc(100% + 10px);

        li {
            margin-bottom: 8px !important;
        }

        a {
            line-height: 30px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 500;
            transition: all 0s, transform 0.3s, text-decoration 0.3s ease-in-out,
            -webkit-text-decoration 0.3s ease-in-out;
            padding: 1px 30px;

            &:hover {
                transform: translateX(6px);
                color: var(--primary);
            }
        }
    }

    &:hover {
        .dropdown-content {
            top: 100%;
            opacity: 1;
            visibility: visible;
        }
    }
}
</style>
