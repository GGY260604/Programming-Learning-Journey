/*
-------------------------------------
        Callback with Data
-------------------------------------
*/

void fetchData(void Function(String result) onDone) {
  onDone("Data loaded");
}

void main() {
  fetchData((data) {
    print(data);
  });
}

/*
Mental model:
"Tell me WHEN you're done, and give me the result."
*/
