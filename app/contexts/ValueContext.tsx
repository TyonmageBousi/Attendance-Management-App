"use client";

import React, { createContext, useState, ReactNode } from "react";

type Post = { date: string; content: string };

type ValueContextType = {
    posts: Post[];
    addPost: (post: Post) => void;
};

export const ValueContext = createContext<ValueContextType | undefined>(undefined);

export function ValueProvider({ children }: { children: ReactNode }) {
    const [posts, setPosts] = useState<Post[]>([]);

    const addPost = (post: Post) => {
        setPosts((prev) => [...prev, post]);
    };

    return (
        <ValueContext.Provider value={{ posts, addPost }}>
            {children}
        </ValueContext.Provider>
    )


}