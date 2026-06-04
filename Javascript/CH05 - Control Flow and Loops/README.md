# CH05 - Control Flow and Loops

This chapter teaches how JavaScript controls the flow of a program.
Instead of always running from top to bottom, JavaScript can make decisions and repeat code.

## Files in This Chapter

| File | Main Focus | Key Syntax / Concepts |
|---|---|---|
| `01 - if else.html` | Conditional decision making | `if`, `else if`, `else`, comparison conditions |
| `02 - switch.html` | Multiple fixed choices | `switch`, `case`, `break`, `default`, fall-through concept |
| `03 - for Loop.html` | Repeating code with a known range | `for (initialization; condition; update)`, loop counter, repeated calculation |
| `04 - while and do while.html` | Repeating code based on a condition | `while`, `do while`, condition checking before/after loop body |
| `05 - break and continue.html` | Controlling loop execution | `break`, `continue`, stopping or skipping loop iterations |
| `06 - for of Loop.html` | Looping through iterable values | `for...of`, array values, string characters |
| `07 - for in Loop.html` | Looping through object properties | `for...in`, object keys, bracket notation, array caution |

## Learning Order

Follow the files in order because each one adds a new control-flow idea:

1. Start with `if else` because it is the basic decision structure.
2. Learn `switch` for fixed choices such as roles, commands, or menu options.
3. Learn `for` when the number of repetitions is known.
4. Learn `while` and `do while` when repetition depends on a condition.
5. Learn `break` and `continue` to control loop behavior.
6. Learn `for...of` for array and string values.
7. Learn `for...in` for object property names.

## Important Notes

- Use `if else` for flexible conditions.
- Use `switch` when one value has many fixed possible cases.
- Use `for` when you know the loop range.
- Use `while` when the loop should continue until a condition changes.
- Use `for...of` for values in arrays and strings.
- Use `for...in` mainly for object keys.
- Avoid infinite loops by making sure the loop condition eventually becomes false.

## Common Beginner Mistakes

| Mistake | Why It Is a Problem | Better Practice |
|---|---|---|
| Forgetting `break` inside `switch` | The next case may also run | Add `break` unless fall-through is intentional |
| Writing a loop with no update | The condition may never become false | Update the counter or condition value inside the loop |
| Using `for...in` for array values | It gives indexes, not values | Use `for...of` for array values |
| Comparing input values without converting | Input values are strings by default | Use `Number()` when numeric comparison is needed |
| Creating too many nested conditions | Code becomes hard to read | Use clearer conditions, helper functions, or `switch` when suitable |
