# CH11 - Events

This chapter teaches JavaScript events using executable HTML examples.

Events allow JavaScript to react when the user clicks, types, moves the mouse, changes form values, or submits a form.

## Files

| File | Main Concept | What You Practice |
|---|---|---|
| 01 - Inline Event Attribute.html | Inline event attributes | `onclick="functionName()"`, passing values, `this`, and `event` from HTML |
| 02 - onclick Property.html | `onclick` property | Assigning an event handler using JavaScript and understanding replacement behavior |
| 03 - addEventListener.html | Modern event listener | Adding multiple handlers and removing a handler using `removeEventListener()` |
| 04 - Event Object.html | Event information | Reading `event.type`, `event.target`, `event.currentTarget`, `clientX`, `clientY`, and `timeStamp` |
| 05 - Mouse Events.html | Mouse interaction | `click`, `dblclick`, `mouseenter`, `mouseleave`, and `mousemove` |
| 06 - Keyboard Events.html | Keyboard interaction | `keydown`, `keyup`, `event.key`, `event.code`, Enter key, and Escape key |
| 07 - Input Change and Submit Events.html | Form events | `input`, `change`, and `submit` events |
| 08 - preventDefault.html | Stop default browser action | Preventing form refresh and stopping link navigation |
| 09 - Event Bubbling Capturing and Delegation.html | Event propagation | Bubbling, capturing, `stopPropagation()`, and event delegation |

## Important Event Patterns

### Inline event attribute

```html
<button onclick="showMessage()">Click</button>
```

Good for beginner demos, but not recommended for large projects because HTML and JavaScript become mixed together.

### onclick property

```javascript
button.onclick = showMessage;
```

Only one `onclick` handler can be stored at a time. A new assignment replaces the old one.

### addEventListener

```javascript
button.addEventListener("click", showMessage);
```

This is the most flexible and recommended approach. It can attach multiple event handlers to the same event.

## Common Event Object Properties

| Property / Method | Meaning |
|---|---|
| `event.type` | The event name, such as `click` or `keydown` |
| `event.target` | The exact element that triggered the event |
| `event.currentTarget` | The element that owns the current event listener |
| `event.clientX` | Mouse X position in the browser viewport |
| `event.clientY` | Mouse Y position in the browser viewport |
| `event.key` | The meaning of the pressed key, such as `Enter` |
| `event.code` | The physical keyboard key, such as `KeyA` |
| `event.preventDefault()` | Stops the default browser behavior |
| `event.stopPropagation()` | Stops the event from continuing through parent elements |

## Recommended Learning Order

1. Start with inline event attributes to understand the basic idea.
2. Move to the `onclick` property to separate JavaScript from HTML.
3. Use `addEventListener()` for real projects.
4. Learn the event object because most event handling depends on it.
5. Learn bubbling and delegation because they are very useful for dynamic DOM elements.
