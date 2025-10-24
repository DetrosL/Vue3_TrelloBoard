export interface Tag {
    id: number;
    name: string;
    desc: string;
    color: string;
}

export interface Step {
    id: number;
    user_id: number;
    task_id: number;
    desc: string;
    completed: boolean;
}

export interface Attach {
    id: number;
    user_id: number;
    task_id: number;
    url: string;
    qtd: number;
}

export interface Comment {
    id: number;
    user_id: number;
    task_id: number;
    desc: string;
}

export interface Task {
    id: number;
    nome: string;
    description: string;
    tags: Tag[];
    comments: Comment[];
    steps: Step[];
    attaches: Attach[];
}

export interface Position {
    id: number;
    desc: string;
    tasks: Task[];
}