/*
  FILE: 03 - user.js

  export default means:
  - This is the main exported value from this module.
  - Only one default export is allowed per module.

  The importing file can choose its own import name.
*/

export default function createUserCard(user) {
  return (
    "User Profile" +
    "Name: " + user.name + " " +
    "Role: " + user.role + " " +
    "Level: " + user.level
  );
}
