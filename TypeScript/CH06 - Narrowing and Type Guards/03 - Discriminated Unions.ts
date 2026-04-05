/**
 * Discriminated union = union types with a shared literal property
 *
 * Very common in APIs and state machines.
 */

type LoadingState = {
  status: "loading"
}

type SuccessState = {
  status: "success"
  data: string
}

type ErrorState = {
  status: "error"
  message: string
}

type ApiState = LoadingState | SuccessState | ErrorState;


function handleState(state: ApiState) {

  switch (state.status) {

    case "loading":
      console.log("Loading...");
      break;

    case "success":
      console.log("Data:", state.data);
      break;

    case "error":
      console.log("Error:", state.message);
      break;

  }

}

handleState({ status: "loading" });
handleState({ status: "success", data: "User Loaded" });
handleState({ status: "error", message: "Server failed" });


/**
 * Discriminated unions are widely used in:
 *
 * React state
 * API responses
 * reducers
 * event systems
 */