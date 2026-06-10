# JavaScript Executable Notes - CH18: jQuery

This chapter is an optional JavaScript library chapter for learning **jQuery**.
It follows the same executable-note style as the previous chapters: every main lesson is a runnable HTML file with teaching comments inside the code.

> jQuery is still useful when maintaining older websites, older admin systems, CMS themes, Bootstrap 3/4-era projects, and legacy AJAX-heavy pages. For new modern projects, many tasks can also be done with plain JavaScript, React, Vue, or other modern tools.

---

## How to Run

Open any `.html` file in a browser.

This chapter uses the official jQuery CDN:

```html
<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
```

Because the library is loaded from a CDN, an internet connection is needed.

For the AJAX lesson, internet access is also needed because it uses a public demo API.

---

## Folder Structure

```text
JavaScript/
└── CH18 - jQuery/
    ├── 01 - jQuery Setup with CDN.html
    ├── 02 - Basic Selectors.html
    ├── 03 - Attribute Selectors.html
    ├── 04 - Position and Filter Selectors.html
    ├── 05 - Form and State Selectors.html
    ├── 06 - Content Value Attribute and Data Methods.html
    ├── 07 - CSS Class and Dimension Methods.html
    ├── 08 - DOM Insertion Removal and Wrapping.html
    ├── 09 - DOM Traversing Methods.html
    ├── 10 - Filtering Chaining and Iteration.html
    ├── 11 - Events and Delegation.html
    ├── 12 - Effects and Animation.html
    ├── 13 - Form Handling.html
    ├── 14 - Ajax GET POST and JSON.html
    ├── 15 - Utility Methods.html
    ├── 16 - Method Argument Patterns.html
    ├── style.css
    └── README.md
```

---

## Chapter File Summary

| File | Main Purpose |
|---|---|
| `01 - jQuery Setup with CDN.html` | Loads jQuery with CDN, checks version, introduces `$()` and document ready. |
| `02 - Basic Selectors.html` | Teaches element, id, class, group, descendant, child, and sibling selectors. |
| `03 - Attribute Selectors.html` | Teaches `[attr]`, `[attr=value]`, `[attr^=value]`, `[attr$=value]`, `[attr*=value]`, `[attr~=value]`, `[attr|=value]`, and combined attribute selectors. |
| `04 - Position and Filter Selectors.html` | Teaches `:first`, `:last`, `:even`, `:odd`, `:eq()`, `:gt()`, `:lt()`, `:not()`, `:contains()`, `:has()`, `:header`, `:empty`, and `:parent`. |
| `05 - Form and State Selectors.html` | Teaches `:input`, `:text`, `:password`, `:checkbox`, `:radio`, `:checked`, `:selected`, `:enabled`, `:disabled`, `:submit`, `:button`, and `:file`. |
| `06 - Content Value Attribute and Data Methods.html` | Teaches `.text()`, `.html()`, `.val()`, `.attr()`, `.prop()`, `.data()`, `.removeAttr()`, and `.removeData()`. |
| `07 - CSS Class and Dimension Methods.html` | Teaches `.css()`, `.addClass()`, `.removeClass()`, `.toggleClass()`, `.hasClass()`, `.width()`, `.height()`, `.innerWidth()`, `.outerWidth()`. |
| `08 - DOM Insertion Removal and Wrapping.html` | Teaches `.append()`, `.prepend()`, `.before()`, `.after()`, `.empty()`, `.remove()`, `.detach()`, `.replaceWith()`, `.wrap()`, `.unwrap()`, `.wrapInner()`. |
| `09 - DOM Traversing Methods.html` | Teaches `.parent()`, `.parents()`, `.children()`, `.find()`, `.siblings()`, `.next()`, `.prev()`, `.closest()`. |
| `10 - Filtering Chaining and Iteration.html` | Teaches `.first()`, `.last()`, `.eq()`, `.slice()`, `.filter()`, `.not()`, `.has()`, `.is()`, `.each()`, `.map()`, `.end()`, and method chaining. |
| `11 - Events and Delegation.html` | Teaches `.on()`, `.off()`, `.one()`, `.trigger()`, event object, `preventDefault()`, `stopPropagation()`, and event delegation. |
| `12 - Effects and Animation.html` | Teaches `.hide()`, `.show()`, `.toggle()`, `.fadeIn()`, `.fadeOut()`, `.fadeToggle()`, `.fadeTo()`, `.slideUp()`, `.slideDown()`, `.slideToggle()`, `.animate()`, `.stop()`. |
| `13 - Form Handling.html` | Teaches reading form values, checkbox/radio/select handling, `.serialize()`, and simple validation. |
| `14 - Ajax GET POST and JSON.html` | Teaches `$.ajax()`, `$.getJSON()`, GET, POST, JSON data, headers, request options, `.done()`, `.fail()`, `.always()`. |
| `15 - Utility Methods.html` | Teaches `$.each()`, `$.map()`, `$.grep()`, `$.extend()`, `$.inArray()`, `$.merge()`, `$.param()`, `$.isPlainObject()`, `$.isEmptyObject()`, `$.parseHTML()`. |
| `16 - Method Argument Patterns.html` | Summarizes common jQuery argument patterns: selector string, getter, setter, object setter, callback setter, event handler, delegated event, AJAX options, and chaining. |

---

## Selector Categories Covered

| Selector Category | Examples |
|---|---|
| Basic selectors | `*`, `p`, `#main-box`, `.special`, `p, li` |
| Relationship selectors | `#main-box p`, `#fruit-list > li`, `h3 + p`, `h3 ~ p` |
| Attribute selectors | `[href]`, `[type='text']`, `[href^='https']`, `[href$='.com']`, `[name*='user']` |
| Word/language attribute selectors | `[data-role~='primary']`, `[lang|='en']` |
| Position/filter selectors | `:first`, `:last`, `:even`, `:odd`, `:eq(2)`, `:gt(2)`, `:lt(3)` |
| Content/structure selectors | `:contains('JavaScript')`, `:has(strong)`, `:empty`, `:parent`, `:header` |
| Form selectors | `:input`, `:text`, `:password`, `:checkbox`, `:radio`, `:submit`, `:button`, `:file` |
| State selectors | `:checked`, `:selected`, `:enabled`, `:disabled` |

---

## Common jQuery Method Argument Patterns

| Pattern | Example | Meaning |
|---|---|---|
| Selector string | `$(".card")` | Select matching elements. |
| Getter | `$("#name").val()` | Read a value because no value is passed. |
| Setter | `$("#name").val("Galen")` | Set a value. |
| Object setter | `$("#box").css({ width: "200px" })` | Set multiple values at once. |
| Callback setter | `.text(function (index, oldText) { return ...; })` | Compute a new value for each matched element. |
| Event handler | `.on("click", function (event) { ... })` | Run code when an event happens. |
| Delegated event | `.on("click", "li", function () { ... })` | Listen for events from current or future child elements. |
| AJAX options object | `$.ajax({ url, method, dataType, data })` | Configure an HTTP request. |
| Chaining | `$("#box").addClass("active").text("Done")` | Run multiple methods on the same selection. |

---

## Important Notes

1. jQuery selectors are usually written as strings inside `$()`.
2. jQuery objects are not exactly the same as normal DOM elements.
3. Use `$(this)` inside jQuery event handlers when you want to use jQuery methods on the clicked/current element.
4. Use `.prop()` for boolean DOM properties such as `checked`, `selected`, and `disabled`.
5. Use `.attr()` for HTML attributes such as `href`, `title`, and `data-*` attributes.
6. Use `.on()` instead of old shortcut event methods.
7. Use delegated events when elements are created dynamically after the page loads.
8. Use `.html()` only with trusted content because it inserts HTML.
9. AJAX examples need internet access and can fail if the API, network, or browser policy blocks the request.

---

## Recommended Study Order

1. Start with file 01 to understand CDN setup and `$()`.
2. Study files 02 to 05 to master selectors.
3. Study files 06 to 10 to manipulate DOM elements.
4. Study file 11 to understand jQuery events and delegation.
5. Study file 12 if you need effects and animation.
6. Study file 13 for forms.
7. Study file 14 for AJAX.
8. Use files 15 and 16 as reference files for utilities and method patterns.
