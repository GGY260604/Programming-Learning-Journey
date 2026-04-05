/*
------------------------------------------------------------
                    FOR LOOP (DETAILED)
------------------------------------------------------------
- for(initial; condition; update) is compact and reduces the chance
  of forgetting the counter update because initialization, condition,
  and update are colocated.
- Still possible to create infinite loops if update is wrong or omitted.
*/

#include <iostream>
using namespace std;

int main() {
    cout << "Standard for loop (counts up):" << endl;
    for (int i = 1; i <= 5; i++) {   // i moves toward making i <= 5 false
        cout << i << " ";
    }
    cout << endl << endl;

    // Infinite for-loop example (dangerous)
    // for (int i = 1; i <= 5; /* missing update */) {
    //     cout << i << " ";
    //     // forgot to change i -> infinite loop
    // }

    cout << "Wrong update direction example:" << endl;
    // i starts at 1, condition is i <= 5, but update moves i away from termination -> infinite
    // for (int i = 1; i <= 5; i -= 1) {  // i becomes 1,0,-1,... never >5 -> infinite
    //     cout << i << " ";
    // }

    cout << "Safer for loop with explicit control variable:" << endl;
    for (int i = 10; i >= 6; i--) { // clear direction: decrease until condition false
        cout << i << " ";
    }
    cout << endl;

    return 0;
}

/*
FOR-LOOP TIPS:
- Keep initialization, condition, and update in one place to reduce mistakes.
- Make sure update moves the loop variable toward making condition false.
- For complex loops, prefer while/do...while if update logic is not a simple increment/decrement.
*/
