# CH19 - Vue.js

This chapter introduces Vue.js using the CDN approach. It is designed for learning Vue inside normal executable HTML files, without npm, Vite, Vue CLI, or build tools.

Vue is a progressive JavaScript framework for building user interfaces. In this note, Vue is used directly in HTML so that each file can be opened and studied like the earlier JavaScript and jQuery chapters.

## CDN Used

```html
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
```

This loads the Vue 3 global build. After the CDN script is loaded, Vue features can be accessed from the global `Vue` object.

Example:

```js
const { createApp } = Vue;

createApp({
  data() {
    return {
      message: "Hello Vue"
    };
  }
}).mount("#app");
```

## Important Notes

- These examples use Vue through CDN, so internet access is required.
- These examples do not use `.vue` Single File Components.
- These examples do not require Node.js, npm, Vite, or a terminal.
- For larger Vue projects, a build tool such as Vite is usually better.
- For learning the syntax and concepts, CDN is simpler and easier to inspect.

## Chapter Files

| File | Main Topic | What You Learn |
|---|---|---|
| `01 - Vue Setup with CDN.html` | Vue CDN setup | Loading Vue from CDN, using `createApp()`, `data()`, `methods`, and `.mount()` |
| `02 - createApp Data and Mount.html` | App instance | Creating multiple Vue apps on one page and understanding app scope |
| `03 - Text Interpolation and Basic Directives.html` | Template syntax | `{{ }}`, `v-text`, `v-html`, `v-once`, `v-pre`, and `v-cloak` |
| `04 - v-bind Dynamic Attributes.html` | Attribute binding | `v-bind`, shorthand `:`, dynamic `href`, `title`, `disabled`, `src`, `alt`, `width`, and `id` |
| `05 - v-on Event Handling.html` | Event handling | `v-on`, shorthand `@`, passing arguments, `$event`, and event modifiers |
| `06 - v-model Form Binding.html` | Two-way binding | Text, number, textarea, checkbox, checkbox group, radio, select, and modifiers |
| `07 - Conditional Rendering.html` | Conditional display | `v-if`, `v-else-if`, `v-else`, and `v-show` |
| `08 - List Rendering with v-for.html` | List rendering | Rendering arrays and objects, using `(item, index)`, `(value, key)`, and `:key` |
| `09 - Class and Style Binding.html` | Dynamic styling | String, object, and array class binding; object style binding |
| `10 - Computed Properties.html` | Computed values | Creating values derived from data, computed caching, and computed chaining |
| `11 - Watchers.html` | Watch side effects | Using `watch` to react to data changes and compare old/new values |
| `12 - Components with CDN.html` | Components | Registering reusable components using `app.component()` |
| `13 - Props.html` | Parent-to-child data | Static props, dynamic props, prop types, required props, and default values |
| `14 - Emits and Custom Events.html` | Child-to-parent events | `$emit()`, custom events, event payloads, and parent listeners |
| `15 - Slots.html` | Component content insertion | Default slots, named slots, and `#slotName` shorthand |
| `16 - Lifecycle Hooks and Template Refs.html` | Component lifecycle | `mounted()`, `updated()`, `ref`, and `this.$refs` |
| `17 - Composition API Basics.html` | Composition API | `setup()`, `ref()`, `reactive()`, `computed()`, `watch()`, and `onMounted()` |
| `18 - Mini Product Filter App.html` | Mini integration | Combining Vue basics into a searchable product filter app |

## Main Vue Syntax Summary

### 1. Create and Mount App

```js
const { createApp } = Vue;

createApp({
  data() {
    return {
      message: "Hello"
    };
  }
}).mount("#app");
```

### 2. Text Interpolation

```html
<p>{{ message }}</p>
```

Use this when you want to display Vue data as text.

### 3. Attribute Binding

```html
<a :href="url">Open Link</a>
<button :disabled="isDisabled">Save</button>
```

`:` is shorthand for `v-bind:`.

### 4. Event Binding

```html
<button @click="increase">Increase</button>
<button @click="addAmount(5)">Add 5</button>
<button @click="showEvent($event)">Show Event</button>
```

`@` is shorthand for `v-on:`.

### 5. Two-Way Form Binding

```html
<input v-model="username">
<input type="number" v-model.number="age">
<input v-model.trim="name">
```

Common modifiers:

| Modifier | Meaning |
|---|---|
| `.trim` | Removes leading and trailing whitespace |
| `.number` | Converts the input value to a number |
| `.lazy` | Updates after the `change` event instead of every input event |

### 6. Conditional Rendering

```html
<p v-if="score >= 80">Excellent</p>
<p v-else-if="score >= 50">Pass</p>
<p v-else>Try again</p>

<p v-show="isVisible">This is hidden or shown using CSS.</p>
```

| Directive | Behavior |
|---|---|
| `v-if` | Adds/removes the element from the DOM |
| `v-show` | Keeps the element in the DOM but changes CSS display |

### 7. List Rendering

```html
<li v-for="(item, index) in items" :key="item.id">
  {{ index + 1 }}. {{ item.name }}
</li>
```

Use `:key` to help Vue track list items correctly.

### 8. Class Binding

```html
<div :class="{ active: isActive, error: hasError }"></div>
<div :class="[mainClass, secondClass]"></div>
```

### 9. Style Binding

```html
<div :style="{ fontSize: size + 'px', padding: '10px' }"></div>
```

### 10. Computed Properties

```js
computed: {
  total() {
    return this.price * this.quantity;
  }
}
```

Use computed properties when the value is derived from existing data.

### 11. Watchers

```js
watch: {
  username(newValue, oldValue) {
    console.log(newValue, oldValue);
  }
}
```

Use watchers when you need to run extra logic after a value changes.

### 12. Components

```js
app.component("user-card", {
  template: `
    <div class="card">
      <h3>{{ name }}</h3>
    </div>
  `,
  data() {
    return {
      name: "Galen"
    };
  }
});
```

### 13. Props

```html
<student-card :name="studentName" :year="2"></student-card>
```

```js
props: {
  name: String,
  year: Number
}
```

Props pass data from parent to child.

### 14. Emits

```js
this.$emit("liked", {
  amount: 1
});
```

```html
<like-button @liked="handleLiked"></like-button>
```

Emits send events from child to parent.

### 15. Slots

```html
<message-box>
  This content goes into the child component slot.
</message-box>
```

```html
<slot></slot>
```

Slots pass template content into a component.

### 16. Composition API

```js
const { createApp, ref, computed } = Vue;

createApp({
  setup() {
    const count = ref(0);

    const doubleCount = computed(function () {
      return count.value * 2;
    });

    function increase() {
      count.value++;
    }

    return {
      count,
      doubleCount,
      increase
    };
  }
}).mount("#app");
```

## Options API vs Composition API

| Style | Main Idea | Suitable For |
|---|---|---|
| Options API | Uses options such as `data`, `methods`, `computed`, and `watch` | Beginner learning and simple components |
| Composition API | Uses `setup()`, `ref()`, `reactive()`, and imported Vue functions | Larger components and reusable logic |

This chapter teaches both, but most beginner files use Options API because it is easier to read inside normal HTML files.

## Recommended Study Order

1. Learn Vue setup and mounting first.
2. Learn interpolation, `v-bind`, `v-on`, and `v-model`.
3. Learn `v-if` and `v-for` because they control what appears on the page.
4. Learn computed properties before watchers.
5. Learn components, props, emits, and slots.
6. Learn Composition API after you understand the Options API basics.
7. Finish by studying the mini product filter app.

## Practice Ideas

After this chapter, try to build:

1. A Vue counter app
2. A Vue todo list
3. A Vue product filter page
4. A Vue form validator
5. A Vue localStorage notes app
6. A Vue student record table
7. A Vue shopping cart calculator

## Key Reminder

In normal JavaScript, you often update the DOM manually:

```js
document.getElementById("result").textContent = message;
```

In Vue, you usually update the data instead:

```js
this.message = "New value";
```

Then Vue updates the DOM automatically.
