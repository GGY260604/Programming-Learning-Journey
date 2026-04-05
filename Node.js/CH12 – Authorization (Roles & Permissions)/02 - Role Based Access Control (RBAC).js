/**
 * ============================================================
 * 02 - Role Based Access Control (RBAC).js
 * ============================================================
 *
 * Goal:
 * - Understand RBAC design
 * - Implement role → permissions mapping
 * - Check permission before allowing action
 *
 * Run:
 * node "02 - Role Based Access Control (RBAC).js"
 *
 * ============================================================
 */

console.log("===== RBAC (Role-Based Access Control) =====");

/**
 * Roles:
 * - user
 * - admin
 * - moderator
 *
 * Permissions:
 * - read_profile
 * - create_post
 * - delete_user
 * - ban_user
 */


/**
 * ============================================================
 * 1️⃣ Define Role → Permission Mapping
 * ============================================================
 */

const RBAC = {
  user: ["read_profile", "create_post"],
  moderator: ["read_profile", "create_post", "ban_user"],
  admin: ["read_profile", "create_post", "ban_user", "delete_user"],
};

console.log("\nRole permissions mapping:");
console.log(RBAC);


/**
 * ============================================================
 * 2️⃣ Permission Check Function
 * ============================================================
 */

function hasPermission(userRole, permission) {
  const allowedPermissions = RBAC[userRole] || [];
  return allowedPermissions.includes(permission);
}


/**
 * ============================================================
 * 3️⃣ Demo Users
 * ============================================================
 */

const alice = { id: 1, name: "Alice", role: "user" };
const bob = { id: 2, name: "Bob", role: "moderator" };
const carol = { id: 3, name: "Carol", role: "admin" };

console.log("\nDemo users:");
console.log(alice);
console.log(bob);
console.log(carol);


/**
 * ============================================================
 * 4️⃣ Test Permission Checks
 * ============================================================
 */

const tests = [
  { user: alice, permission: "delete_user" },
  { user: bob, permission: "ban_user" },
  { user: carol, permission: "delete_user" },
  { user: alice, permission: "read_profile" },
];

console.log("\nPermission tests:");

tests.forEach(({ user, permission }) => {
  const result = hasPermission(user.role, permission);
  console.log(`${user.name} (${user.role}) can ${permission}? →`, result);
});


/**
 * ============================================================
 * 5️⃣ How This Looks in Backend
 * ============================================================
 *
 * API rule examples:
 *
 * GET /profile
 * - any logged-in user can access
 *
 * DELETE /users/:id
 * - only admin can access
 *
 * POST /ban/:id
 * - moderator or admin can access
 *
 * In Express, you implement this using middleware.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ RBAC = role decides permissions
 * ✔ Simple and common in real systems
 * ✔ Easy to maintain when roles are stable
 * ✔ Implemented using middleware in APIs
 *
 * ============================================================
 */