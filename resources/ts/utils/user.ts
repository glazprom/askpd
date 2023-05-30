interface AuthUserInterface {
    csrf_token: string,
    id: number,
    name: string,
    email: string,
    api_token: string,
    role: string,
    roles: Array<string>,
}

export class AuthUser {
    private static _authUser: AuthUserInterface | null = null

    public static init(): AuthUserInterface {
        if (!AuthUser._authUser) {
            AuthUser._authUser = {
                // @ts-ignore
                csrf_token: window.authUser.csrf_token,
                // @ts-ignore
                id: window.authUser.id,
                // @ts-ignore
                name: window.authUser.name,
                // @ts-ignore
                email: window.authUser.email,
                // @ts-ignore
                api_token: window.authUser.api_token,
                // @ts-ignore
                role: window.authUser.role,
                // @ts-ignore
                roles: window.authUser.roles
            }
        }

        return AuthUser._authUser
    }
}
