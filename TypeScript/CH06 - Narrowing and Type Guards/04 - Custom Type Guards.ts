/**
 * Sometimes TypeScript cannot infer types automatically.
 * We can write custom type guards.
 */

interface Fish {
  swim: () => void
}

interface Bird {
  fly: () => void
}

/**
 * Custom type guard function
 */

function isFish(animal: Fish | Bird): animal is Fish {
  return (animal as Fish).swim !== undefined;
}

function moveAnimal(animal: Fish | Bird) {

  if (isFish(animal)) {
    animal.swim();
  } else {
    animal.fly();
  }

}

const fish: Fish = {
  swim: () => console.log("Fish swimming")
};

const bird: Bird = {
  fly: () => console.log("Bird flying")
};

moveAnimal(fish);
moveAnimal(bird);


/**
 * Key syntax:
 *
 * animal is Fish
 *
 * tells TypeScript:
 * "If this function returns true, treat animal as Fish."
 */