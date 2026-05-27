# CSS Executable Notes

## Overview

This repository is a structured **executable CSS note**. Instead of only reading theory, every chapter contains runnable `.html` files that demonstrate CSS syntax, properties, values, and common usage directly in the browser.

Each chapter follows this naming pattern:

```text
CHxx - Topic Name/
├── 01 - Concept Name.html
├── 02 - Concept Name.html
├── ...
└── README.md
```

Most examples use internal CSS inside the `<style>` tag so each file can run independently. External CSS is used only when the chapter teaches external stylesheet usage.

## How to Study

1. Open each chapter folder in order.
2. Open each `.html` file in a browser.
3. Read the comments inside the HTML and CSS code.
4. Change one CSS value at a time.
5. Refresh the browser and observe the result.
6. Use the chapter practice file to review the topic.

Recommended order:

```text
CH01 → CH02 → CH03 → CH04 → CH05 → CH06 → CH07 → CH08 → CH09 → CH10
```

---

# Chapter Overview

| Chapter | Topic | Summary |
|---|---|---|
| CH01 | CSS Introduction and Syntax | How to write CSS, connect CSS to HTML, and understand CSS rule syntax. |
| CH02 | Selectors | How to target HTML elements using basic, relationship, attribute, pseudo-class, and pseudo-element selectors. |
| CH03 | Cascade, Specificity and Inheritance | How CSS decides which rule wins when multiple rules target the same element. |
| CH04 | Colors and Backgrounds | How to style text color, background color, gradients, images, repeat, size, position, opacity, and transparency. |
| CH05 | Text and Fonts | How to control fonts, text alignment, spacing, decoration, shadow, wrapping, and overflow. |
| CH06 | Box Model | How content, width, height, padding, border, margin, outline, and box sizing work. |
| CH07 | Display and Visibility | How elements behave as block, inline, inline-block, hidden, removed, or special display types. |
| CH08 | Positioning | How static, relative, absolute, fixed, sticky, offsets, and z-index work. |
| CH09 | Flexbox Layout | How to build one-dimensional layouts using flex containers and flex items. |
| CH10 | Grid Layout | How to build two-dimensional layouts using rows, columns, named areas, and responsive grids. |

---

# CH01 - CSS Introduction and Syntax

## Summary

CH01 introduces the foundation of CSS. It explains inline CSS, internal CSS, external CSS, CSS comments, CSS rule structure, and how to link external stylesheets.

## Files

```text
CH01 - CSS Introduction and Syntax/
├── 01 - Inline Internal External CSS.html
├── 02 - CSS Rule Syntax.html
├── 03 - CSS Comments and Formatting.html
├── 04 - CSS File Linking and Path.html
├── 05 - Chapter Practice.html
├── external-style.css
└── README.md
```

## CSS Syntax Reference

| Concept | Syntax / Example | Explanation |
|---|---|---|
| Inline CSS | `<p style="color: red;">` | CSS written directly inside an HTML element using the `style` attribute. Best for quick testing only. |
| Internal CSS | `<style> p { color: red; } </style>` | CSS written inside the HTML file, usually inside `<head>`. Good for small examples. |
| External CSS | `<link rel="stylesheet" href="style.css">` | CSS written in a separate `.css` file. Best for real websites. |
| Selector | `p`, `.card`, `#title` | Selects which HTML element should be styled. |
| Declaration block | `{ color: red; }` | The curly-brace block that stores CSS declarations. |
| Property | `color` | The CSS feature being changed. |
| Value | `red` | The setting assigned to a property. |
| Declaration | `color: red;` | A property-value pair. |
| Colon | `property: value` | Separates property and value. |
| Semicolon | `color: red;` | Ends one declaration. |
| CSS comment | `/* comment */` | Explanation ignored by the browser. |

## Shorthand / Longhand Notes

| Form | Related Longhand / Alternative | Explanation |
|---|---|---|
| `style="color: red; font-size: 20px;"` | Separate stylesheet declarations | Inline CSS can contain multiple declarations but is harder to maintain. |
| `.box { padding: 10px; }` | `.box { padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; }` | A CSS rule can use shorthand properties inside a declaration block. |

---

# CH02 - Selectors

## Summary

CH02 explains how to select HTML elements before applying styles. Selectors are one of the most important CSS skills because every CSS rule begins with a selector.

## Files

```text
CH02 - Selectors/
├── 01 - Basic Selectors.html
├── 02 - Class ID and Group Selectors.html
├── 03 - Descendant Child and Sibling Selectors.html
├── 04 - Attribute Selectors.html
├── 05 - Pseudo Classes.html
├── 06 - Pseudo Elements.html
├── 07 - Selector Combination Practice.html
└── README.md
```

## Selector Reference

| Selector Type | Syntax / Example | Explanation |
|---|---|---|
| Universal selector | `*` | Selects all elements. Common for resets such as `box-sizing: border-box;`. |
| Type selector | `p`, `h1`, `div` | Selects all elements with that tag name. |
| Class selector | `.card` | Selects all elements with `class="card"`. Reusable and recommended for styling. |
| ID selector | `#main-title` | Selects the element with `id="main-title"`. Should be unique in a page. |
| Group selector | `h1, h2, p` | Applies the same style to multiple selectors. |
| Multiple class selector | `.badge.rounded` | Selects elements that have both classes, such as `class="badge rounded"`. |
| Descendant selector | `.article p` | Selects all `p` elements inside `.article`, including deeply nested ones. |
| Child selector | `.menu > li` | Selects only direct `li` children of `.menu`. |
| Adjacent sibling selector | `h3 + p` | Selects the first `p` immediately after an `h3`. |
| General sibling selector | `.start ~ p` | Selects all matching sibling elements after `.start`. |
| Attribute exists | `input[required]` | Selects elements that contain the specified attribute. |
| Attribute equals | `input[type="email"]` | Selects elements where the attribute exactly matches the value. |
| Attribute starts with | `a[href^="https"]` | Selects attributes that start with a value. |
| Attribute ends with | `a[href$=".pdf"]` | Selects attributes that end with a value. |
| Attribute contains | `a[href*="github"]` | Selects attributes that contain a value. |
| Data attribute selector | `[data-status="active"]` | Selects custom `data-*` attributes. |

## Pseudo-Class Reference

| Pseudo-Class | Example | Explanation |
|---|---|---|
| `:hover` | `.button:hover` | Applies when the mouse is over the element. |
| `:focus` | `input:focus` | Applies when an element is focused. |
| `:checked` | `input:checked` | Applies when a checkbox or radio input is checked. |
| `:first-child` | `li:first-child` | Selects the first child inside a parent. |
| `:last-child` | `li:last-child` | Selects the last child inside a parent. |
| `:nth-child()` | `tr:nth-child(even)` | Selects children based on a pattern. |
| `:not()` | `p:not(.special)` | Selects elements that do not match the selector. |
| `:disabled` | `button:disabled` | Selects disabled form elements. |
| `:enabled` | `input:enabled` | Selects enabled form elements. |
| `:required` | `input:required` | Selects required form controls. |
| `:optional` | `input:optional` | Selects optional form controls. |

## Pseudo-Element Reference

| Pseudo-Element | Example | Explanation |
|---|---|---|
| `::before` | `.note::before` | Inserts virtual content before an element. Requires `content`. |
| `::after` | `.note::after` | Inserts virtual content after an element. Requires `content`. |
| `::first-letter` | `p::first-letter` | Styles the first letter of text. |
| `::first-line` | `p::first-line` | Styles the first visible line of text. |
| `::selection` | `p::selection` | Styles selected text. |
| `::placeholder` | `input::placeholder` | Styles placeholder text. |

---

# CH03 - Cascade, Specificity and Inheritance

## Summary

CH03 explains how CSS decides which style wins when rules conflict. It covers cascade order, specificity, inheritance, `!important`, inline style priority, and global CSS values.

## Files

```text
CH03 - Cascade Specificity and Inheritance/
├── 01 - Cascade Order.html
├── 02 - Specificity.html
├── 03 - Inheritance.html
├── 04 - Important Keyword.html
├── 05 - Initial Inherit Unset Revert.html
├── 06 - Inline Style vs Internal Style.html
├── 07 - Chapter Practice.html
└── README.md
```

## Cascade Reference

| Concept | Example | Explanation |
|---|---|---|
| Cascade order | Same selector written twice | If specificity is equal, the later rule usually wins. |
| Specificity | `#id` beats `.class` | More specific selectors usually override less specific selectors. |
| Inline style | `<p style="color: red;">` | Has very high priority compared with normal CSS rules. |
| `!important` | `color: red !important;` | Overrides normal priority. Use carefully. |
| Inheritance | Parent `color` affects child text | Some properties are inherited by child elements. |
| Non-inherited property | Parent `border` does not affect child | Many box-related properties do not inherit automatically. |

## Specificity Ranking

| Selector / Source | Example | Strength |
|---|---|---|
| Inline style | `style="color: red;"` | Very strong |
| ID selector | `#header` | Strong |
| Class / pseudo-class / attribute | `.card`, `:hover`, `[type="text"]` | Medium |
| Type / pseudo-element | `p`, `h1`, `::before` | Low |
| Universal selector | `*` | Very low |

## Global CSS Values

| Value | Example | Explanation |
|---|---|---|
| `initial` | `color: initial;` | Resets to the property initial value. |
| `inherit` | `border: inherit;` | Forces the element to copy the parent value. |
| `unset` | `color: unset;` | Acts like `inherit` for inherited properties and `initial` for non-inherited properties. |
| `revert` | `all: revert;` | Reverts closer to browser/user-agent stylesheet behavior. |
| `revert-layer` | `color: revert-layer;` | Reverts to the previous cascade layer. Advanced. |

## Shorthand / Special Forms

| Form | Related Longhand | Explanation |
|---|---|---|
| `all: revert;` | Applies to almost all properties | Resets many properties at once. |
| `!important` | Added to one declaration | Priority modifier, not a normal shorthand. |
| `inherit` | Can be used on any individual property | Forces inheritance for that property. |

---

# CH04 - Colors and Backgrounds

## Summary

CH04 teaches color formats, text color, background color, background images, gradients, repeat, size, position, background shorthand, opacity, and transparency.

## Files

```text
CH04 - Colors and Backgrounds/
├── 01 - Color Values.html
├── 02 - Text Color and Background Color.html
├── 03 - Background Image.html
├── 04 - Background Repeat Size Position.html
├── 05 - Background Shorthand.html
├── 06 - Opacity and Transparency.html
├── 07 - Chapter Practice.html
└── README.md
```

## Color Properties and Values

| Property / Value | Common Examples | Explanation |
|---|---|---|
| `color` | `red`, `#333`, `rgb(0, 0, 0)`, `hsl(0, 0%, 0%)` | Sets text color. |
| `background-color` | `white`, `#f4f4f4`, `rgba(0,0,0,0.5)`, `transparent` | Sets background color. |
| Color name | `red`, `blue`, `green`, `orange` | Easy to read but limited. |
| HEX | `#0057d9`, `#fff`, `#ffffff` | Common web color format. |
| RGB | `rgb(255, 0, 0)` | Red, green, blue channels. |
| RGBA | `rgba(255, 0, 0, 0.5)` | RGB with alpha transparency. |
| HSL | `hsl(220, 80%, 50%)` | Hue, saturation, lightness. |
| HSLA | `hsla(220, 80%, 50%, 0.5)` | HSL with alpha transparency. |
| `transparent` | `background-color: transparent;` | Fully transparent color. |
| `currentColor` | `border-color: currentColor;` | Uses the current text color. |

## Background Properties

| Property | Common Values | Explanation |
|---|---|---|
| `background-color` | `#fff`, `transparent`, `rgba(...)` | Sets background color. |
| `background-image` | `url("image.jpg")`, `linear-gradient(...)`, `radial-gradient(...)` | Sets image or gradient background. |
| `background-repeat` | `repeat`, `no-repeat`, `repeat-x`, `repeat-y`, `space`, `round` | Controls background repeating. |
| `background-size` | `auto`, `cover`, `contain`, `100px 100px`, `50%` | Controls background image size. |
| `background-position` | `center`, `top right`, `50% 50%`, `20px 10px` | Controls background image position. |
| `background-attachment` | `scroll`, `fixed`, `local` | Controls whether background scrolls with the page. |
| `background-clip` | `border-box`, `padding-box`, `content-box`, `text` | Controls how far background extends. |
| `background-origin` | `padding-box`, `border-box`, `content-box` | Controls where background positioning starts. |
| `background-blend-mode` | `normal`, `multiply`, `screen`, `overlay` | Blends background layers. |
| `opacity` | `0`, `0.5`, `1` | Makes the whole element transparent, including text and children. |

## Gradient Functions

| Function | Example | Explanation |
|---|---|---|
| `linear-gradient()` | `linear-gradient(to right, blue, purple)` | Creates a directional gradient. |
| `radial-gradient()` | `radial-gradient(circle, yellow, red)` | Creates a gradient from a center point outward. |
| `repeating-linear-gradient()` | `repeating-linear-gradient(45deg, #fff 0 10px, #ddd 10px 20px)` | Creates repeated linear patterns. |
| `repeating-radial-gradient()` | `repeating-radial-gradient(circle, red 0 10px, blue 10px 20px)` | Creates repeated radial patterns. |

## Background Shorthand and Longhand

| Shorthand | Longhand Properties | Explanation |
|---|---|---|
| `background: #fff;` | `background-color` | Sets only background color. |
| `background: url("img.jpg") no-repeat center / cover;` | `background-image`, `background-repeat`, `background-position`, `background-size` | Common image background shorthand. |
| `background: color image repeat position / size;` | Multiple background properties | Slash `/` separates position and size. |
| `background: layer1, layer2;` | Multiple background layers | First layer appears on top, last layer at the back. |

---

# CH05 - Text and Fonts

## Summary

CH05 teaches font family, fallback fonts, font size, weight, style, text alignment, decoration, transform, line height, spacing, shadow, indentation, white-space, overflow, word breaking, and external font concepts.

## Files

```text
CH05 - Text and Fonts/
├── 01 - Font Family and Fallback.html
├── 02 - Font Size Weight and Style.html
├── 03 - Text Align Decoration Transform.html
├── 04 - Line Height Letter Spacing Word Spacing.html
├── 05 - Text Shadow and Indent.html
├── 06 - White Space and Text Overflow.html
├── 07 - Word Break and Overflow Wrap.html
├── 08 - Web Safe Fonts and External Font Idea.html
├── 09 - Chapter Practice.html
└── README.md
```

## Font Properties

| Property | Common Values | Explanation |
|---|---|---|
| `font-family` | `Arial, sans-serif`, `Georgia, serif`, `"Courier New", monospace` | Controls font face. |
| `font-size` | `16px`, `1rem`, `1.2em`, `100%`, `5vw` | Controls text size. |
| `font-weight` | `normal`, `bold`, `100` to `900` | Controls text thickness. |
| `font-style` | `normal`, `italic`, `oblique` | Controls slanted text. |
| `font-variant` | `normal`, `small-caps` | Controls special font variant display. |
| `font-stretch` | `normal`, `condensed`, `expanded` | Controls font width if supported. |
| `line-height` | `1.6`, `24px`, `150%` | Controls line spacing. |
| `font-kerning` | `auto`, `normal`, `none` | Controls spacing adjustment between letters. |

## Text Properties

| Property | Common Values | Explanation |
|---|---|---|
| `text-align` | `left`, `center`, `right`, `justify`, `start`, `end` | Horizontal text alignment. |
| `text-decoration-line` | `underline`, `overline`, `line-through`, `none` | Decoration line type. |
| `text-decoration-color` | `red`, `#0057d9` | Decoration line color. |
| `text-decoration-style` | `solid`, `double`, `dotted`, `dashed`, `wavy` | Decoration line style. |
| `text-decoration-thickness` | `auto`, `2px`, `from-font` | Decoration thickness. |
| `text-transform` | `none`, `uppercase`, `lowercase`, `capitalize` | Changes capitalization visually. |
| `text-indent` | `40px`, `2em`, `-20px` | Indents the first text line. |
| `text-shadow` | `2px 2px 4px gray` | Adds shadow to text. |
| `letter-spacing` | `normal`, `2px`, `0.1em` | Space between letters. |
| `word-spacing` | `normal`, `8px`, `0.2em` | Space between words. |
| `white-space` | `normal`, `nowrap`, `pre`, `pre-wrap`, `pre-line`, `break-spaces` | Controls spaces and line breaks. |
| `text-overflow` | `clip`, `ellipsis` | Controls hidden overflowing inline text. |
| `overflow-wrap` | `normal`, `break-word`, `anywhere` | Allows long words to break. |
| `word-break` | `normal`, `break-all`, `keep-all` | Controls word-breaking behavior. |
| `direction` | `ltr`, `rtl` | Controls text direction. |
| `writing-mode` | `horizontal-tb`, `vertical-rl`, `vertical-lr` | Controls writing direction. |

## Font and Text Shorthand

| Shorthand | Longhand Properties | Explanation |
|---|---|---|
| `font: italic bold 22px/1.5 Georgia, serif;` | `font-style`, `font-weight`, `font-size`, `line-height`, `font-family` | Main font shorthand. `font-size` and `font-family` are required. |
| `text-decoration: underline wavy red 2px;` | `text-decoration-line`, `text-decoration-style`, `text-decoration-color`, `text-decoration-thickness` | Text decoration shorthand. |
| `text-shadow: 2px 2px 4px gray;` | Offset-x, offset-y, blur, color | Compact multi-value property for text shadow. |

---

# CH06 - Box Model

## Summary

CH06 explains the CSS box model. It covers content size, width, height, padding, margin, border, border radius, box sizing, margin collapse, and outline.

## Files

```text
CH06 - Box Model/
├── 01 - Box Model Overview.html
├── 02 - Width and Height.html
├── 03 - Padding.html
├── 04 - Margin.html
├── 05 - Border.html
├── 06 - Border Radius.html
├── 07 - Box Sizing.html
├── 08 - Margin Collapse.html
├── 09 - Outline vs Border.html
├── 10 - Chapter Practice.html
└── README.md
```

## Box Model Properties

| Property | Common Values | Explanation |
|---|---|---|
| `width` | `300px`, `50%`, `auto`, `100vw` | Sets content width unless `box-sizing: border-box` is used. |
| `height` | `100px`, `50%`, `auto`, `100vh` | Sets content height unless `box-sizing: border-box` is used. |
| `min-width` | `200px`, `50%`, `0` | Minimum width. |
| `max-width` | `500px`, `100%`, `none` | Maximum width. Useful for responsive design. |
| `min-height` | `100px`, `50vh` | Minimum height. |
| `max-height` | `300px`, `80vh`, `none` | Maximum height. |
| `padding` | `20px`, `10px 20px`, `10px 20px 30px 40px` | Space inside the border. |
| `margin` | `20px`, `0 auto`, `10px 20px 30px 40px` | Space outside the border. |
| `border` | `2px solid #333` | Line around content and padding. |
| `border-radius` | `10px`, `50%`, `999px` | Rounds corners. |
| `box-sizing` | `content-box`, `border-box` | Controls whether width includes padding and border. |
| `outline` | `2px solid orange` | Line outside the element that does not affect layout size. |
| `outline-offset` | `4px`, `-2px` | Distance between outline and element. |

## Padding and Margin Shorthand

| Shorthand Pattern | Meaning |
|---|---|
| `padding: 20px;` / `margin: 20px;` | All sides. |
| `padding: 10px 20px;` / `margin: 10px 20px;` | Top/bottom, left/right. |
| `padding: 10px 20px 30px;` / `margin: 10px 20px 30px;` | Top, left/right, bottom. |
| `padding: 10px 20px 30px 40px;` / `margin: 10px 20px 30px 40px;` | Top, right, bottom, left. Clockwise order. |
| `margin: 0 auto;` | Common horizontal centering for fixed-width block elements. |

## Border Shorthand and Longhand

| Shorthand | Longhand Properties | Explanation |
|---|---|---|
| `border: 2px solid #333;` | `border-width`, `border-style`, `border-color` | Main border shorthand. |
| `border-top: 2px solid red;` | `border-top-width`, `border-top-style`, `border-top-color` | Top border only. |
| `border-right: 2px solid red;` | `border-right-width`, `border-right-style`, `border-right-color` | Right border only. |
| `border-bottom: 2px solid red;` | `border-bottom-width`, `border-bottom-style`, `border-bottom-color` | Bottom border only. |
| `border-left: 2px solid red;` | `border-left-width`, `border-left-style`, `border-left-color` | Left border only. |
| `border-radius: 10px;` | All corner radius values | Rounds all corners. |
| Individual radius | `border-top-left-radius`, `border-top-right-radius`, `border-bottom-right-radius`, `border-bottom-left-radius` | Controls individual corners. |

---

# CH07 - Display and Visibility

## Summary

CH07 teaches how elements participate in layout and visibility. It explains `display`, `visibility`, and `opacity`, including differences between hidden, invisible, and removed elements.

## Files

```text
CH07 - Display and Visibility/
├── 01 - Display Overview.html
├── 02 - Block Elements.html
├── 03 - Inline Elements.html
├── 04 - Inline Block.html
├── 05 - Display None vs Visibility Hidden.html
├── 06 - Display Contents.html
├── 07 - Display Flow Root.html
├── 08 - Display Table.html
├── 09 - Chapter Practice.html
└── README.md
```

## Display and Visibility Properties

| Property | Value | Explanation |
|---|---|---|
| `display` | `block` | Starts on a new line and usually fills available width. |
| `display` | `inline` | Stays in text flow; width and height do not work normally. |
| `display` | `inline-block` | Stays inline but accepts box sizing better. |
| `display` | `none` | Removes element from layout completely. |
| `display` | `flex` | Creates a flex container. |
| `display` | `inline-flex` | Creates an inline flex container. |
| `display` | `grid` | Creates a grid container. |
| `display` | `inline-grid` | Creates an inline grid container. |
| `display` | `contents` | Removes parent box but keeps children visible. |
| `display` | `flow-root` | Creates a new block formatting context. Useful for containing floats. |
| `display` | `table`, `table-row`, `table-cell` | Makes elements behave like table parts. |
| `visibility` | `visible` | Element is visible. |
| `visibility` | `hidden` | Element is invisible but still takes space. |
| `visibility` | `collapse` | Mostly used for table rows/columns. |
| `opacity` | `0` to `1` | Controls transparency. |

## Visibility Comparison

| Method | Visible? | Takes Space? | Explanation |
|---|---|---|---|
| `display: none;` | No | No | Removed from layout. |
| `visibility: hidden;` | No | Yes | Hidden but space remains. |
| `opacity: 0;` | No visually | Yes | Transparent but still exists and may still be interactive. |

---

# CH08 - Positioning

## Summary

CH08 teaches how to place elements using `position`, offset properties, `z-index`, and common real-world positioning patterns such as badges, overlays, fixed buttons, and sticky headers.

## Files

```text
CH08 - Positioning/
├── 01 - Position Overview.html
├── 02 - Static Position.html
├── 03 - Relative Position.html
├── 04 - Absolute Position.html
├── 05 - Fixed Position.html
├── 06 - Sticky Position.html
├── 07 - Top Right Bottom Left.html
├── 08 - Z Index and Stacking.html
├── 09 - Common Positioning Patterns.html
├── 10 - Chapter Practice.html
└── README.md
```

## Position Properties

| Property | Values | Explanation |
|---|---|---|
| `position` | `static` | Default. Element follows normal document flow. Offsets do not affect it. |
| `position` | `relative` | Element stays in normal flow but can be visually moved. |
| `position` | `absolute` | Removed from normal flow and positioned relative to nearest positioned ancestor. |
| `position` | `fixed` | Positioned relative to viewport and stays fixed while scrolling. |
| `position` | `sticky` | Behaves normally first, then sticks when it reaches the offset. |
| `top` | `0`, `20px`, `50%` | Offset from top reference edge. |
| `right` | `0`, `20px`, `10%` | Offset from right reference edge. |
| `bottom` | `0`, `20px`, `10%` | Offset from bottom reference edge. |
| `left` | `0`, `20px`, `50%` | Offset from left reference edge. |
| `z-index` | `auto`, `1`, `10`, `999` | Controls stacking order. |
| `inset` | `0`, `10px`, `10px 20px` | Shorthand for top, right, bottom, and left. |

## Offset Shorthand and Longhand

| Shorthand | Longhand Meaning | Explanation |
|---|---|---|
| `inset: 0;` | `top: 0; right: 0; bottom: 0; left: 0;` | Makes positioned element fill the containing block. |
| `inset: 10px 20px;` | Top/bottom 10px, left/right 20px | Two-value shorthand. |
| `inset: 10px 20px 30px 40px;` | Top, right, bottom, left | Four-value clockwise shorthand. |

## Common Positioning Patterns

| Pattern | Main CSS | Explanation |
|---|---|---|
| Card badge | Parent `position: relative`, badge `position: absolute` | Places badge inside card corner. |
| Fixed button | `position: fixed; right: 20px; bottom: 20px;` | Keeps button visible while scrolling. |
| Sticky header | `position: sticky; top: 0;` | Header sticks when it reaches the top. |
| Overlay | `position: absolute; inset: 0;` | Covers the parent area. |
| Centered absolute item | `top: 50%; left: 50%; transform: translate(-50%, -50%);` | Centers absolute element. |

---

# CH09 - Flexbox Layout

## Summary

CH09 teaches Flexbox, a one-dimensional layout system. Flexbox is excellent for arranging items in a row or column, aligning content, creating navigation bars, responsive card rows, and equal-width layouts.

## Files

```text
CH09 - Flexbox Layout/
├── 01 - Flexbox Overview.html
├── 02 - Flex Direction.html
├── 03 - Justify Content.html
├── 04 - Align Items.html
├── 05 - Flex Wrap and Gap.html
├── 06 - Align Content.html
├── 07 - Flex Grow Shrink Basis.html
├── 08 - Order and Align Self.html
├── 09 - Common Flexbox Patterns.html
├── 10 - Responsive Flexbox Cards.html
├── 11 - Chapter Practice.html
└── README.md
```

## Flex Container Properties

| Property | Common Values | Explanation |
|---|---|---|
| `display` | `flex`, `inline-flex` | Creates a flex container. |
| `flex-direction` | `row`, `row-reverse`, `column`, `column-reverse` | Controls main axis direction. |
| `flex-wrap` | `nowrap`, `wrap`, `wrap-reverse` | Controls whether items wrap. |
| `flex-flow` | `row wrap`, `column nowrap` | Shorthand for `flex-direction` and `flex-wrap`. |
| `justify-content` | `flex-start`, `center`, `flex-end`, `space-between`, `space-around`, `space-evenly` | Aligns items along the main axis. |
| `align-items` | `stretch`, `flex-start`, `center`, `flex-end`, `baseline` | Aligns items along the cross axis. |
| `align-content` | `stretch`, `flex-start`, `center`, `flex-end`, `space-between`, `space-around`, `space-evenly` | Aligns multiple flex lines. Requires wrapping. |
| `gap` | `16px`, `1rem`, `10px 20px` | Spacing between flex items. |
| `row-gap` | `20px` | Vertical spacing between rows. |
| `column-gap` | `20px` | Horizontal spacing between columns. |

## Flex Item Properties

| Property | Common Values | Explanation |
|---|---|---|
| `flex-grow` | `0`, `1`, `2` | Controls how item grows when extra space exists. |
| `flex-shrink` | `0`, `1`, `2` | Controls how item shrinks when space is limited. |
| `flex-basis` | `auto`, `0`, `200px`, `30%` | Starting size before growing or shrinking. |
| `flex` | `1`, `1 1 0`, `0 0 200px`, `1 1 240px` | Shorthand for grow, shrink, basis. |
| `order` | `0`, `-1`, `1`, `2` | Changes visual order. |
| `align-self` | `auto`, `stretch`, `flex-start`, `center`, `flex-end`, `baseline` | Overrides `align-items` for one item. |

## Flexbox Shorthand and Longhand

| Shorthand | Longhand Properties | Explanation |
|---|---|---|
| `flex-flow: row wrap;` | `flex-direction: row; flex-wrap: wrap;` | Container shorthand. |
| `flex: 1;` | Commonly behaves like `flex: 1 1 0%;` | Makes items share space. |
| `flex: 1 1 240px;` | `flex-grow: 1; flex-shrink: 1; flex-basis: 240px;` | Responsive card pattern. |
| `gap: 10px 20px;` | `row-gap: 10px; column-gap: 20px;` | Row and column gap shorthand. |

---

# CH10 - Grid Layout

## Summary

CH10 teaches CSS Grid, a two-dimensional layout system. Grid is best when you need rows and columns at the same time, such as dashboards, galleries, page layouts, and card systems.

## Files

```text
CH10 - Grid Layout/
├── 01 - Grid Overview.html
├── 02 - Grid Template Columns and Rows.html
├── 03 - Repeat Minmax and Auto Fit.html
├── 04 - Grid Gap.html
├── 05 - Grid Column and Row Placement.html
├── 06 - Grid Template Areas.html
├── 07 - Justify Align Place Items.html
├── 08 - Justify Align Place Content.html
├── 09 - Common Grid Patterns.html
├── 10 - Chapter Practice.html
└── README.md
```

## Grid Container Properties

| Property | Common Values | Explanation |
|---|---|---|
| `display` | `grid`, `inline-grid` | Creates a grid container. |
| `grid-template-columns` | `1fr 1fr`, `repeat(3, 1fr)`, `200px 1fr` | Defines column tracks. |
| `grid-template-rows` | `auto 1fr`, `100px 200px`, `repeat(3, 80px)` | Defines row tracks. |
| `grid-template-areas` | `"header header" "sidebar main"` | Defines named layout areas. |
| `grid-template` | Rows, columns, areas | Shorthand for grid template properties. |
| `gap` | `16px`, `10px 20px` | Spacing between rows and columns. |
| `row-gap` | `20px` | Vertical gap between rows. |
| `column-gap` | `20px` | Horizontal gap between columns. |
| `justify-items` | `start`, `center`, `end`, `stretch` | Aligns items horizontally inside cells. |
| `align-items` | `start`, `center`, `end`, `stretch` | Aligns items vertically inside cells. |
| `place-items` | `center`, `start end` | Shorthand for `align-items` and `justify-items`. |
| `justify-content` | `start`, `center`, `end`, `space-between`, `space-around`, `space-evenly` | Aligns the whole grid horizontally. |
| `align-content` | `start`, `center`, `end`, `space-between`, `space-around`, `space-evenly`, `stretch` | Aligns the whole grid vertically. |
| `place-content` | `center`, `start end` | Shorthand for `align-content` and `justify-content`. |
| `grid-auto-columns` | `100px`, `1fr`, `minmax(100px, auto)` | Size of implicitly created columns. |
| `grid-auto-rows` | `100px`, `auto`, `minmax(100px, auto)` | Size of implicitly created rows. |
| `grid-auto-flow` | `row`, `column`, `dense`, `row dense` | Controls auto-placement flow. |

## Grid Item Properties

| Property | Common Values | Explanation |
|---|---|---|
| `grid-column-start` | `1`, `2`, `span 2` | Starting column line. |
| `grid-column-end` | `3`, `span 2` | Ending column line. |
| `grid-column` | `1 / 3`, `span 2` | Shorthand for column start and end. |
| `grid-row-start` | `1`, `2`, `span 2` | Starting row line. |
| `grid-row-end` | `3`, `span 2` | Ending row line. |
| `grid-row` | `1 / 3`, `span 2` | Shorthand for row start and end. |
| `grid-area` | `header`, `1 / 1 / 3 / 3` | Assigns named area or line-based placement. |
| `justify-self` | `start`, `center`, `end`, `stretch` | Aligns one item horizontally inside its cell. |
| `align-self` | `start`, `center`, `end`, `stretch` | Aligns one item vertically inside its cell. |
| `place-self` | `center`, `start end` | Shorthand for `align-self` and `justify-self`. |

## Grid Functions and Keywords

| Function / Keyword | Example | Explanation |
|---|---|---|
| `fr` | `1fr`, `2fr` | Fraction of available space. |
| `repeat()` | `repeat(3, 1fr)` | Repeats track definitions. |
| `minmax()` | `minmax(180px, 1fr)` | Sets minimum and maximum track size. |
| `auto-fit` | `repeat(auto-fit, minmax(180px, 1fr))` | Fits as many columns as possible and collapses empty tracks. |
| `auto-fill` | `repeat(auto-fill, minmax(180px, 1fr))` | Fits as many columns as possible and keeps empty tracks. |
| `auto` | `auto 1fr` | Size based on content or available space depending on context. |
| `span` | `grid-column: span 2;` | Makes an item span tracks. |

## Grid Shorthand and Longhand

| Shorthand | Longhand Properties | Explanation |
|---|---|---|
| `grid-template` | `grid-template-rows`, `grid-template-columns`, `grid-template-areas` | Defines explicit grid structure. |
| `grid-column: 1 / 3;` | `grid-column-start: 1; grid-column-end: 3;` | Places item across columns. |
| `grid-row: 1 / 3;` | `grid-row-start: 1; grid-row-end: 3;` | Places item across rows. |
| `grid-area: header;` | Named area connection | Used with `grid-template-areas`. |
| `grid-area: 1 / 1 / 3 / 3;` | Row start / column start / row end / column end | Line-based area shorthand. |
| `place-items: center;` | `align-items: center; justify-items: center;` | Aligns all items inside cells. |
| `place-content: center;` | `align-content: center; justify-content: center;` | Aligns the whole grid. |
| `place-self: center;` | `align-self: center; justify-self: center;` | Aligns one item. |
| `gap: 10px 20px;` | `row-gap: 10px; column-gap: 20px;` | Sets row and column gaps. |

---

# Overall CSS Property Quick Reference

| Category | Main Properties / Concepts |
|---|---|
| Syntax | selector, property, value, declaration, rule block, comment |
| Selectors | universal, type, class, ID, group, descendant, child, sibling, attribute, pseudo-class, pseudo-element |
| Cascade | specificity, inheritance, `!important`, `initial`, `inherit`, `unset`, `revert` |
| Colors | `color`, `background-color`, HEX, RGB, RGBA, HSL, HSLA |
| Backgrounds | `background`, `background-image`, `background-repeat`, `background-size`, `background-position`, `opacity` |
| Text and Fonts | `font-family`, `font-size`, `font-weight`, `font-style`, `line-height`, `text-align`, `text-decoration`, `text-transform`, `text-shadow`, `white-space`, `text-overflow`, `word-break`, `overflow-wrap` |
| Box Model | `width`, `height`, `min-width`, `max-width`, `padding`, `margin`, `border`, `border-radius`, `box-sizing`, `outline` |
| Display | `display`, `visibility`, `opacity` |
| Positioning | `position`, `top`, `right`, `bottom`, `left`, `inset`, `z-index` |
| Flexbox | `display: flex`, `flex-direction`, `justify-content`, `align-items`, `flex-wrap`, `align-content`, `flex`, `order`, `align-self`, `gap` |
| Grid | `display: grid`, `grid-template-columns`, `grid-template-rows`, `grid-template-areas`, `grid-column`, `grid-row`, `grid-area`, `place-items`, `place-content`, `gap` |

---

# Recommended Next Chapters

The current note set is enough for CSS basics. If you continue later, possible next chapters are:

```text
CH11 - Sizing Units and Values
CH12 - Borders Outline and Radius
CH13 - Spacing Margin Padding Gap
CH14 - Overflow Scroll and Clipping
CH15 - Images Object Fit and Filters
CH16 - Lists Tables and Forms Styling
CH17 - Transform Transition and Animation
CH18 - Responsive Design
CH19 - CSS Variables and Functions
CH20 - At Rules
CH21 - Modern CSS Features
CH22 - Mini Projects and Layout Practice
```

---

# Final Study Advice

CSS is best learned by editing values and observing changes. For each executable file:

1. Open the file in your browser.
2. Read the comments inside the code.
3. Change one value.
4. Refresh the page.
5. Observe what changed.
6. Repeat until the behavior becomes clear.

