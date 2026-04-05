/**
 * ============================================================
 * 01 - What is Authorization.js
 * ============================================================
 *
 * Goal:
 * - Understand what authorization is
 * - Understand roles and permissions
 * - Understand difference between authentication vs authorization
 *
 * Run:
 * node "01 - What is Authorization.js"
 *
 * ============================================================
 */

console.log("===== Authorization Basics =====");

/**
 * Authentication:
 * - Who are you?
 * - Example: user logs in and proves identity
 *
 * Authorization:
 * - What are you allowed to do?
 * - Example: only admins can delete users
 */

console.log("\nAuthentication vs Authorization:");
console.log("- Authentication: Who are you?");
console.log("- Authorization: What can you do?");


/**
 * ============================================================
 * Role Example
 * ============================================================
 *
 * Roles are a common way to implement authorization.
 *
 * Example roles:
 * - user
 * - admin
 * - moderator
 */

console.log("\n===== Roles Example =====");

const roles = ["user", "admin", "moderator"];
console.log("Example roles:", roles);


/**
 * ============================================================
 * Permission Example
 * ============================================================
 *
 * Permissions describe actions.
 *
 * Example permissions:
 * - read_profile
 * - create_post
 * - delete_user
 */

console.log("\n===== Permissions Example =====");

const permissions = ["read_profile", "create_post", "delete_user"];
console.log("Example permissions:", permissions);


/**
 * ============================================================
 * Role → Permissions Mapping (Simple Example)
 * ============================================================
 */

console.log("\n===== Role → Permissions (Example) =====");

const rolePermissions = {
  user: ["read_profile", "create_post"],
  admin: ["read_profile", "create_post", "delete_user"],
};

console.log(rolePermissions);


/**
 * ============================================================
 * Example Scenario
 * ============================================================
 */

console.log("\n===== Scenario =====");

const currentUser = {
  id: 1,
  email: "alice@example.com",
  role: "user",
};

console.log("Current user:", currentUser);

function can(user, permission) {
  const allowed = rolePermissions[user.role] || [];
  return allowed.includes(permission);
}

console.log("\nCan current user delete_user?");
console.log(can(currentUser, "delete_user")); // false

console.log("\nCan current user read_profile?");
console.log(can(currentUser, "read_profile")); // true


/**
 * ============================================================
 * Backend Meaning
 * ============================================================
 *
 * In an API:
 * - Authentication middleware verifies token (logged in)
 * - Authorization middleware checks role/permission (allowed)
 *
 * Example:
 *
 * GET /profile      -> requires login (auth)
 * DELETE /users/:id -> requires admin (auth + authorization)
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Authentication: identity
 * ✔ Authorization: permissions
 * ✔ Roles are a common authorization method
 * ✔ Backend often uses middleware for authorization checks
 *
 * ============================================================
 */