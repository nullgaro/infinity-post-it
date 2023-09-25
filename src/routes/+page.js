export const load = async ({ fetch }) => {
    const serverSync = await fetch("http://localhost:8080/init", {
        credentials: "include",
    });
    const syncData = await serverSync.json()
    const serverUsername = syncData.username

    return {
        serverUsername: serverUsername
    }
}